<?php

declare(strict_types=1);

namespace Zenky\Articles\Interfaces;

use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface ArticleCategoriesServiceInterface
{
    public function create(StoreInterface $store, CreateRequestInterface $request): ArticleCategoryInterface;

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedResponseInterface;

    public function show(StoreInterface $store, ShowRequestInterface $request): ArticleCategoryInterface;

    public function update(StoreInterface $store, UpdateRequestInterface $request): ArticleCategoryInterface;

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void;
}
