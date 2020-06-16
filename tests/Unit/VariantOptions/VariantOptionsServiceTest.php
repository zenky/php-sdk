<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\VariantOptions;

use Zenky\Api\Requests\CreateRequest;
use Zenky\Api\Requests\DeleteRequest;
use Zenky\Api\Requests\ListRequest;
use Zenky\Api\Requests\ShowRequest;
use Zenky\Api\Requests\UpdateRequest;
use Zenky\VariantOptions\VariantOptionsService;
use Zenky\VariantOptions\Interfaces\VariantOptionInterface;
use Zenky\VariantOptions\Interfaces\Responses\PaginatedVariantOptionsResponseInterface;
use Zenky\Tests\TestCase;

class VariantOptionsServiceTest extends TestCase
{
    public function testItShouldCreateVariantOptions()
    {
        $store = $this->createStore();
        $request = new CreateRequest([]);

        $client = $this->createHttpMockForCreateRequest(
            $store,
            $request,
            'variant-options',
            fn () => $this->createFakeResponseForEntity('variant-options/option.json')
        );

        $service = new VariantOptionsService($client, 'secret');
        $item = $service->create($store, $request);
        $this->assertInstanceOf(VariantOptionInterface::class, $item);
    }

    public function testItShouldListVariantOptions()
    {
        $store = $this->createStore();
        $request = new ListRequest();

        $client = $this->createHttpMockForListRequest(
            $store,
            $request,
            'variant-options',
            fn () => $this->createFakeResponseForEntitiesCollection(5, 'variant-options/option.json')
        );

        $service = new VariantOptionsService($client, 'secret');
        $response = $service->list($store, $request);
        $this->assertInstanceOf(PaginatedVariantOptionsResponseInterface::class, $response);
        $this->assertSame(5, count($response->getItems()));

        foreach ($response->getItems() as $item) {
            $this->assertInstanceOf(VariantOptionInterface::class, $item);
        }
    }

    public function testItShouldShowVariantOptions()
    {
        $store = $this->createStore();
        $request = new ShowRequest('id');

        $client = $this->createHttpMockForShowRequest(
            $store,
            $request,
            'variant-options/id',
            fn () => $this->createFakeResponseForEntity('variant-options/option.json')
        );

        $service = new VariantOptionsService($client, 'secret');
        $item = $service->show($store, $request);
        $this->assertInstanceOf(VariantOptionInterface::class, $item);
    }

    public function testItShouldUpdateVariantOptions()
    {
        $store = $this->createStore();
        $request = new UpdateRequest('id', []);

        $client = $this->createHttpMockForUpdateRequest(
            $store,
            $request,
            'variant-options/id',
            fn () => $this->createFakeResponseForEntity('variant-options/option.json')
        );

        $service = new VariantOptionsService($client, 'secret');
        $item = $service->update($store, $request);
        $this->assertInstanceOf(VariantOptionInterface::class, $item);
    }

    public function testItShouldDeleteVariantOptions()
    {
        $store = $this->createStore();
        $request = new DeleteRequest('id');

        $client = $this->createHttpMockForDeleteRequest(
            $store,
            $request,
            'variant-options/id'
        );

        $service = new VariantOptionsService($client, 'secret');
        $service->delete($store, $request);
    }
}
