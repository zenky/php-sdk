<?php

declare(strict_types=1);

namespace Zenky\Categories\Interfaces;

use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Categories\Interfaces\Responses\PaginatedCategoriesResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface CategoriesServiceInterface
{
    public function create(StoreInterface $store, CreateRequestInterface $request): CategoryInterface;

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedCategoriesResponseInterface;

    public function show(StoreInterface $store, ShowRequestInterface $request): CategoryInterface;

    public function update(StoreInterface $store, UpdateRequestInterface $request): CategoryInterface;

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void;
}
