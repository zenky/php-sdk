<?php

declare(strict_types=1);

namespace Zenky\Products;

use Zenky\Api\AbstractApiService;
use Zenky\Api\Interfaces\Requests\ApiRequestInterface;
use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Products\Interfaces\ProductsServiceInterface;
use Zenky\Products\Interfaces\ProductInterface;
use Zenky\Products\Interfaces\Responses\PaginatedProductsResponseInterface;
use Zenky\Products\Responses\PaginatedProductsResponse;
use Zenky\Stores\Interfaces\StoreInterface;

class ProductsService extends AbstractApiService implements ProductsServiceInterface
{
    protected function getRootUrl(StoreInterface $store, ApiRequestInterface $request): string
    {
        return 'products';
    }

    public function create(StoreInterface $store, CreateRequestInterface $request): ProductInterface
    {
        return $this->createEntity($store, $request, fn (array $data) => new Product($data));
    }

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedProductsResponseInterface
    {
        return $this->listEntities($store, $request, PaginatedProductsResponse::class, fn (array $data) => new Product($data));
    }

    public function show(StoreInterface $store, ShowRequestInterface $request): ProductInterface
    {
        return $this->showEntity($store, $request, fn (array $data) => new Product($data));
    }

    public function update(StoreInterface $store, UpdateRequestInterface $request): ProductInterface
    {
        return $this->updateEntity($store, $request, fn (array $data) => new Product($data));
    }

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void
    {
        $this->deleteEntity($store, $request);
    }
}
