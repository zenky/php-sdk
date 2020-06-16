<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\Stocks;

use Zenky\Api\Requests\CreateRequest;
use Zenky\Api\Requests\DeleteRequest;
use Zenky\Api\Requests\ListRequest;
use Zenky\Api\Requests\ShowRequest;
use Zenky\Api\Requests\UpdateRequest;
use Zenky\Stocks\StocksService;
use Zenky\Stocks\Interfaces\StockInterface;
use Zenky\Stocks\Interfaces\Responses\PaginatedStocksResponseInterface;
use Zenky\Tests\TestCase;

class StocksServiceTest extends TestCase
{
    public function testItShouldCreateStocks()
    {
        $store = $this->createStore();
        $request = new CreateRequest([]);

        $client = $this->createHttpMockForCreateRequest(
            $store,
            $request,
            'stocks',
            fn () => $this->createFakeResponseForEntity('stocks/stock.json')
        );

        $service = new StocksService($client, 'secret');
        $item = $service->create($store, $request);
        $this->assertInstanceOf(StockInterface::class, $item);
    }

    public function testItShouldListStocks()
    {
        $store = $this->createStore();
        $request = new ListRequest();

        $client = $this->createHttpMockForListRequest(
            $store,
            $request,
            'stocks',
            fn () => $this->createFakeResponseForEntitiesCollection(5, 'stocks/stock.json')
        );

        $service = new StocksService($client, 'secret');
        $response = $service->list($store, $request);
        $this->assertInstanceOf(PaginatedStocksResponseInterface::class, $response);
        $this->assertSame(5, count($response->getItems()));

        foreach ($response->getItems() as $item) {
            $this->assertInstanceOf(StockInterface::class, $item);
        }
    }

    public function testItShouldShowStocks()
    {
        $store = $this->createStore();
        $request = new ShowRequest('id');

        $client = $this->createHttpMockForShowRequest(
            $store,
            $request,
            'stocks/id',
            fn () => $this->createFakeResponseForEntity('stocks/stock.json')
        );

        $service = new StocksService($client, 'secret');
        $item = $service->show($store, $request);
        $this->assertInstanceOf(StockInterface::class, $item);
    }

    public function testItShouldUpdateStocks()
    {
        $store = $this->createStore();
        $request = new UpdateRequest('id', []);

        $client = $this->createHttpMockForUpdateRequest(
            $store,
            $request,
            'stocks/id',
            fn () => $this->createFakeResponseForEntity('stocks/stock.json')
        );

        $service = new StocksService($client, 'secret');
        $item = $service->update($store, $request);
        $this->assertInstanceOf(StockInterface::class, $item);
    }

    public function testItShouldDeleteStocks()
    {
        $store = $this->createStore();
        $request = new DeleteRequest('id');

        $client = $this->createHttpMockForDeleteRequest(
            $store,
            $request,
            'stocks/id'
        );

        $service = new StocksService($client, 'secret');
        $service->delete($store, $request);
    }
}
