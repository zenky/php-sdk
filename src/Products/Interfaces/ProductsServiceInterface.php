<?php

declare(strict_types=1);

namespace Zenky\Products\Interfaces;

use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Products\Interfaces\Responses\PaginatedProductsResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface ProductsServiceInterface
{
    public function create(StoreInterface $store, CreateRequestInterface $request): ProductInterface;

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedProductsResponseInterface;

    public function show(StoreInterface $store, ShowRequestInterface $request): ProductInterface;

    public function update(StoreInterface $store, UpdateRequestInterface $request): ProductInterface;

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void;
}
