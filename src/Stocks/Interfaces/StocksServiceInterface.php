<?php

declare(strict_types=1);

namespace Zenky\Stocks\Interfaces;

use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Stocks\Interfaces\Responses\PaginatedStocksResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface StocksServiceInterface
{
    public function create(StoreInterface $store, CreateRequestInterface $request): StockInterface;

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedStocksResponseInterface;

    public function show(StoreInterface $store, ShowRequestInterface $request): StockInterface;

    public function update(StoreInterface $store, UpdateRequestInterface $request): StockInterface;

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void;
}
