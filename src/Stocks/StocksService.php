<?php

declare(strict_types=1);

namespace Zenky\Stocks;

use Zenky\Api\AbstractApiService;
use Zenky\Api\Interfaces\Requests\ApiRequestInterface;
use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Stocks\Interfaces\StocksServiceInterface;
use Zenky\Stocks\Interfaces\StockInterface;
use Zenky\Stocks\Interfaces\Responses\PaginatedStocksResponseInterface;
use Zenky\Stocks\Responses\PaginatedStocksResponse;
use Zenky\Stores\Interfaces\StoreInterface;

class StocksService extends AbstractApiService implements StocksServiceInterface
{
    protected function getRootUrl(StoreInterface $store, ApiRequestInterface $request): string
    {
        return 'stocks';
    }

    public function create(StoreInterface $store, CreateRequestInterface $request): StockInterface
    {
        return $this->createEntity($store, $request, fn (array $data) => new Stock($data));
    }

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedStocksResponseInterface
    {
        return $this->listEntities($store, $request, PaginatedStocksResponse::class, fn (array $data) => new Stock($data));
    }

    public function show(StoreInterface $store, ShowRequestInterface $request): StockInterface
    {
        return $this->showEntity($store, $request, fn (array $data) => new Stock($data));
    }

    public function update(StoreInterface $store, UpdateRequestInterface $request): StockInterface
    {
        return $this->updateEntity($store, $request, fn (array $data) => new Stock($data));
    }

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void
    {
        $this->deleteEntity($store, $request);
    }
}
