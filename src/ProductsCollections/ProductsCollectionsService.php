<?php

declare(strict_types=1);

namespace Zenky\ProductsCollections;

use Zenky\Api\AbstractApiService;
use Zenky\Api\Interfaces\Requests\ApiRequestInterface;
use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\ProductsCollections\Interfaces\ProductsCollectionsServiceInterface;
use Zenky\ProductsCollections\Interfaces\ProductsCollectionInterface;
use Zenky\ProductsCollections\Interfaces\Responses\PaginatedProductsCollectionsResponseInterface;
use Zenky\ProductsCollections\Responses\PaginatedProductsCollectionsResponse;
use Zenky\Stores\Interfaces\StoreInterface;

class ProductsCollectionsService extends AbstractApiService implements ProductsCollectionsServiceInterface
{
    protected function getRootUrl(StoreInterface $store, ApiRequestInterface $request): string
    {
        return 'products-collections';
    }

    public function create(StoreInterface $store, CreateRequestInterface $request): ProductsCollectionInterface
    {
        return $this->createEntity($store, $request, fn (array $data) => new ProductsCollection($data));
    }

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedProductsCollectionsResponseInterface
    {
        return $this->listEntities($store, $request, PaginatedProductsCollectionsResponse::class, fn (array $data) => new ProductsCollection($data));
    }

    public function show(StoreInterface $store, ShowRequestInterface $request): ProductsCollectionInterface
    {
        return $this->showEntity($store, $request, fn (array $data) => new ProductsCollection($data));
    }

    public function update(StoreInterface $store, UpdateRequestInterface $request): ProductsCollectionInterface
    {
        return $this->updateEntity($store, $request, fn (array $data) => new ProductsCollection($data));
    }

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void
    {
        $this->deleteEntity($store, $request);
    }
}
