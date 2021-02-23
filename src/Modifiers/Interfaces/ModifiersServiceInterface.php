<?php

declare(strict_types=1);

namespace Zenky\Modifiers\Interfaces;

use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Modifiers\Interfaces\Responses\PaginatedModifiersResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface ModifiersServiceInterface
{
    public function create(StoreInterface $store, CreateRequestInterface $request): ModifierInterface;

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedModifiersResponseInterface;

    public function show(StoreInterface $store, ShowRequestInterface $request): ModifierInterface;

    public function update(StoreInterface $store, UpdateRequestInterface $request): ModifierInterface;

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void;
}
