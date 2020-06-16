<?php

declare(strict_types=1);

namespace Zenky\Categories;

use Zenky\Api\AbstractApiService;
use Zenky\Api\Interfaces\Requests\ApiRequestInterface;
use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Categories\Interfaces\CategoriesServiceInterface;
use Zenky\Categories\Interfaces\CategoryInterface;
use Zenky\Categories\Interfaces\Responses\PaginatedCategoriesResponseInterface;
use Zenky\Categories\Responses\PaginatedCategoriesResponse;
use Zenky\Stores\Interfaces\StoreInterface;

class CategoriesService extends AbstractApiService implements CategoriesServiceInterface
{
    protected function getRootUrl(StoreInterface $store, ApiRequestInterface $request): string
    {
        return 'categories';
    }

    public function create(StoreInterface $store, CreateRequestInterface $request): CategoryInterface
    {
        return $this->createEntity($store, $request, fn (array $data) => new Category($data));
    }

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedCategoriesResponseInterface
    {
        return $this->listEntities(
            $store,
            $request,
            PaginatedCategoriesResponse::class,
            fn (array $data) => new Category($data)
        );
    }

    public function show(StoreInterface $store, ShowRequestInterface $request): CategoryInterface
    {
        return $this->showEntity($store, $request, fn (array $data) => new Category($data));
    }

    public function update(StoreInterface $store, UpdateRequestInterface $request): CategoryInterface
    {
        return $this->updateEntity($store, $request, fn (array $data) => new Category($data));
    }

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void
    {
        $this->deleteEntity($store, $request);
    }
}
