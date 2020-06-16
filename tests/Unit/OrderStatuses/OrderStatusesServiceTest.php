<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\OrderStatuses;

use Zenky\Api\Requests\CreateRequest;
use Zenky\Api\Requests\DeleteRequest;
use Zenky\Api\Requests\ListRequest;
use Zenky\Api\Requests\ShowRequest;
use Zenky\Api\Requests\UpdateRequest;
use Zenky\OrderStatuses\OrderStatusesService;
use Zenky\OrderStatuses\Interfaces\OrderStatusInterface;
use Zenky\OrderStatuses\Interfaces\Responses\PaginatedOrderStatusesResponseInterface;
use Zenky\Tests\TestCase;

class OrderStatusesServiceTest extends TestCase
{
    public function testItShouldCreateOrderStatuses()
    {
        $store = $this->createStore();
        $request = new CreateRequest([]);

        $client = $this->createHttpMockForCreateRequest(
            $store,
            $request,
            'order-statuses',
            fn () => $this->createFakeResponseForEntity('order-statuses/status.json')
        );

        $service = new OrderStatusesService($client, 'secret');
        $item = $service->create($store, $request);
        $this->assertInstanceOf(OrderStatusInterface::class, $item);
    }

    public function testItShouldListOrderStatuses()
    {
        $store = $this->createStore();
        $request = new ListRequest();

        $client = $this->createHttpMockForListRequest(
            $store,
            $request,
            'order-statuses',
            fn () => $this->createFakeResponseForEntitiesCollection(5, 'order-statuses/status.json')
        );

        $service = new OrderStatusesService($client, 'secret');
        $response = $service->list($store, $request);
        $this->assertInstanceOf(PaginatedOrderStatusesResponseInterface::class, $response);
        $this->assertSame(5, count($response->getItems()));

        foreach ($response->getItems() as $item) {
            $this->assertInstanceOf(OrderStatusInterface::class, $item);
        }
    }

    public function testItShouldShowOrderStatuses()
    {
        $store = $this->createStore();
        $request = new ShowRequest('id');

        $client = $this->createHttpMockForShowRequest(
            $store,
            $request,
            'order-statuses/id',
            fn () => $this->createFakeResponseForEntity('order-statuses/status.json')
        );

        $service = new OrderStatusesService($client, 'secret');
        $item = $service->show($store, $request);
        $this->assertInstanceOf(OrderStatusInterface::class, $item);
    }

    public function testItShouldUpdateOrderStatuses()
    {
        $store = $this->createStore();
        $request = new UpdateRequest('id', []);

        $client = $this->createHttpMockForUpdateRequest(
            $store,
            $request,
            'order-statuses/id',
            fn () => $this->createFakeResponseForEntity('order-statuses/status.json')
        );

        $service = new OrderStatusesService($client, 'secret');
        $item = $service->update($store, $request);
        $this->assertInstanceOf(OrderStatusInterface::class, $item);
    }

    public function testItShouldDeleteOrderStatuses()
    {
        $store = $this->createStore();
        $request = new DeleteRequest('id');

        $client = $this->createHttpMockForDeleteRequest(
            $store,
            $request,
            'order-statuses/id'
        );

        $service = new OrderStatusesService($client, 'secret');
        $service->delete($store, $request);
    }
}
