<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\SalesChannels;

use Zenky\Api\Requests\CreateRequest;
use Zenky\Api\Requests\DeleteRequest;
use Zenky\Api\Requests\ListRequest;
use Zenky\Api\Requests\ShowRequest;
use Zenky\Api\Requests\UpdateRequest;
use Zenky\SalesChannels\SalesChannelsService;
use Zenky\SalesChannels\Interfaces\SalesChannelInterface;
use Zenky\SalesChannels\Interfaces\Responses\PaginatedSalesChannelsResponseInterface;
use Zenky\Tests\TestCase;

class SalesChannelsServiceTest extends TestCase
{
    public function testItShouldCreateSalesChannels()
    {
        $store = $this->createStore();
        $request = new CreateRequest([]);

        $client = $this->createHttpMockForCreateRequest(
            $store,
            $request,
            'sales-channels',
            fn () => $this->createFakeResponseForEntity('sales-channels/channel.json')
        );

        $service = new SalesChannelsService($client, 'secret');
        $item = $service->create($store, $request);
        $this->assertInstanceOf(SalesChannelInterface::class, $item);
    }

    public function testItShouldListSalesChannels()
    {
        $store = $this->createStore();
        $request = new ListRequest();

        $client = $this->createHttpMockForListRequest(
            $store,
            $request,
            'sales-channels',
            fn () => $this->createFakeResponseForEntitiesCollection(5, 'sales-channels/channel.json')
        );

        $service = new SalesChannelsService($client, 'secret');
        $response = $service->list($store, $request);
        $this->assertInstanceOf(PaginatedSalesChannelsResponseInterface::class, $response);
        $this->assertSame(5, count($response->getItems()));

        foreach ($response->getItems() as $item) {
            $this->assertInstanceOf(SalesChannelInterface::class, $item);
        }
    }

    public function testItShouldShowSalesChannels()
    {
        $store = $this->createStore();
        $request = new ShowRequest('id');

        $client = $this->createHttpMockForShowRequest(
            $store,
            $request,
            'sales-channels/id',
            fn () => $this->createFakeResponseForEntity('sales-channels/channel.json')
        );

        $service = new SalesChannelsService($client, 'secret');
        $item = $service->show($store, $request);
        $this->assertInstanceOf(SalesChannelInterface::class, $item);
    }

    public function testItShouldUpdateSalesChannels()
    {
        $store = $this->createStore();
        $request = new UpdateRequest('id', []);

        $client = $this->createHttpMockForUpdateRequest(
            $store,
            $request,
            'sales-channels/id',
            fn () => $this->createFakeResponseForEntity('sales-channels/channel.json')
        );

        $service = new SalesChannelsService($client, 'secret');
        $item = $service->update($store, $request);
        $this->assertInstanceOf(SalesChannelInterface::class, $item);
    }

    public function testItShouldDeleteSalesChannels()
    {
        $store = $this->createStore();
        $request = new DeleteRequest('id');

        $client = $this->createHttpMockForDeleteRequest(
            $store,
            $request,
            'sales-channels/id'
        );

        $service = new SalesChannelsService($client, 'secret');
        $service->delete($store, $request);
    }
}
