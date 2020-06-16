<?php

declare(strict_types=1);

namespace Zenky\ProductsCollections\Interfaces;

use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\ProductsCollections\Interfaces\Responses\PaginatedProductsCollectionsResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface ProductsCollectionsServiceInterface
{
    public function create(StoreInterface $store, CreateRequestInterface $request): ProductsCollectionInterface;

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedProductsCollectionsResponseInterface;

    public function show(StoreInterface $store, ShowRequestInterface $request): ProductsCollectionInterface;

    public function update(StoreInterface $store, UpdateRequestInterface $request): ProductsCollectionInterface;

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void;
}
