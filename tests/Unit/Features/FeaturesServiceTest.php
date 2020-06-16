<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\Features;

use Zenky\Api\Requests\CreateRequest;
use Zenky\Api\Requests\DeleteRequest;
use Zenky\Api\Requests\ListRequest;
use Zenky\Api\Requests\ShowRequest;
use Zenky\Api\Requests\UpdateRequest;
use Zenky\Features\FeaturesService;
use Zenky\Features\Interfaces\FeatureInterface;
use Zenky\Features\Interfaces\Responses\PaginatedFeaturesResponseInterface;
use Zenky\Tests\TestCase;

class FeaturesServiceTest extends TestCase
{
    public function testItShouldCreateFeatures()
    {
        $store = $this->createStore();
        $request = new CreateRequest([]);

        $client = $this->createHttpMockForCreateRequest(
            $store,
            $request,
            'features',
            fn () => $this->createFakeResponseForEntity('features/feature.json')
        );

        $service = new FeaturesService($client, 'secret');
        $item = $service->create($store, $request);
        $this->assertInstanceOf(FeatureInterface::class, $item);
    }

    public function testItShouldListFeatures()
    {
        $store = $this->createStore();
        $request = new ListRequest();

        $client = $this->createHttpMockForListRequest(
            $store,
            $request,
            'features',
            fn () => $this->createFakeResponseForEntitiesCollection(5, 'features/feature.json')
        );

        $service = new FeaturesService($client, 'secret');
        $response = $service->list($store, $request);
        $this->assertInstanceOf(PaginatedFeaturesResponseInterface::class, $response);
        $this->assertSame(5, count($response->getItems()));

        foreach ($response->getItems() as $item) {
            $this->assertInstanceOf(FeatureInterface::class, $item);
        }
    }

    public function testItShouldShowFeatures()
    {
        $store = $this->createStore();
        $request = new ShowRequest('id');

        $client = $this->createHttpMockForShowRequest(
            $store,
            $request,
            'features/id',
            fn () => $this->createFakeResponseForEntity('features/feature.json')
        );

        $service = new FeaturesService($client, 'secret');
        $item = $service->show($store, $request);
        $this->assertInstanceOf(FeatureInterface::class, $item);
    }

    public function testItShouldUpdateFeatures()
    {
        $store = $this->createStore();
        $request = new UpdateRequest('id', []);

        $client = $this->createHttpMockForUpdateRequest(
            $store,
            $request,
            'features/id',
            fn () => $this->createFakeResponseForEntity('features/feature.json')
        );

        $service = new FeaturesService($client, 'secret');
        $item = $service->update($store, $request);
        $this->assertInstanceOf(FeatureInterface::class, $item);
    }

    public function testItShouldDeleteFeatures()
    {
        $store = $this->createStore();
        $request = new DeleteRequest('id');

        $client = $this->createHttpMockForDeleteRequest(
            $store,
            $request,
            'features/id'
        );

        $service = new FeaturesService($client, 'secret');
        $service->delete($store, $request);
    }
}
