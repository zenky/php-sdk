<?php

declare(strict_types=1);

namespace Zenky\Modifiers\Interfaces;

use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Modifiers\Interfaces\Responses\PaginatedModifiersGroupsResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface ModifiersGroupsServiceInterface
{
    public function create(StoreInterface $store, CreateRequestInterface $request): ModifiersGroupInterface;

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedModifiersGroupsResponseInterface;

    public function show(StoreInterface $store, ShowRequestInterface $request): ModifiersGroupInterface;

    public function update(StoreInterface $store, UpdateRequestInterface $request): ModifiersGroupInterface;

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void;
}
