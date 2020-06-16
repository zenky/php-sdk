<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\PriceTypes;

use Zenky\Api\Requests\CreateRequest;
use Zenky\Api\Requests\DeleteRequest;
use Zenky\Api\Requests\ListRequest;
use Zenky\Api\Requests\ShowRequest;
use Zenky\Api\Requests\UpdateRequest;
use Zenky\PriceTypes\PriceTypesService;
use Zenky\PriceTypes\Interfaces\PriceTypeInterface;
use Zenky\PriceTypes\Interfaces\Responses\PaginatedPriceTypesResponseInterface;
use Zenky\Tests\TestCase;

class PriceTypesServiceTest extends TestCase
{
    public function testItShouldCreatePriceTypes()
    {
        $store = $this->createStore();
        $request = new CreateRequest([]);

        $client = $this->createHttpMockForCreateRequest(
            $store,
            $request,
            'price-types',
            fn () => $this->createFakeResponseForEntity('price-types/type.json')
        );

        $service = new PriceTypesService($client, 'secret');
        $item = $service->create($store, $request);
        $this->assertInstanceOf(PriceTypeInterface::class, $item);
    }

    public function testItShouldListPriceTypes()
    {
        $store = $this->createStore();
        $request = new ListRequest();

        $client = $this->createHttpMockForListRequest(
            $store,
            $request,
            'price-types',
            fn () => $this->createFakeResponseForEntitiesCollection(5, 'price-types/type.json')
        );

        $service = new PriceTypesService($client, 'secret');
        $response = $service->list($store, $request);
        $this->assertInstanceOf(PaginatedPriceTypesResponseInterface::class, $response);
        $this->assertSame(5, count($response->getItems()));

        foreach ($response->getItems() as $item) {
            $this->assertInstanceOf(PriceTypeInterface::class, $item);
        }
    }

    public function testItShouldShowPriceTypes()
    {
        $store = $this->createStore();
        $request = new ShowRequest('id');

        $client = $this->createHttpMockForShowRequest(
            $store,
            $request,
            'price-types/id',
            fn () => $this->createFakeResponseForEntity('price-types/type.json')
        );

        $service = new PriceTypesService($client, 'secret');
        $item = $service->show($store, $request);
        $this->assertInstanceOf(PriceTypeInterface::class, $item);
    }

    public function testItShouldUpdatePriceTypes()
    {
        $store = $this->createStore();
        $request = new UpdateRequest('id', []);

        $client = $this->createHttpMockForUpdateRequest(
            $store,
            $request,
            'price-types/id',
            fn () => $this->createFakeResponseForEntity('price-types/type.json')
        );

        $service = new PriceTypesService($client, 'secret');
        $item = $service->update($store, $request);
        $this->assertInstanceOf(PriceTypeInterface::class, $item);
    }

    public function testItShouldDeletePriceTypes()
    {
        $store = $this->createStore();
        $request = new DeleteRequest('id');

        $client = $this->createHttpMockForDeleteRequest(
            $store,
            $request,
            'price-types/id'
        );

        $service = new PriceTypesService($client, 'secret');
        $service->delete($store, $request);
    }
}
