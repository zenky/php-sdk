<?php

declare(strict_types=1);

namespace Zenky\Modifiers;

use Zenky\Api\AbstractApiService;
use Zenky\Api\Interfaces\Requests\ApiRequestInterface;
use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Modifiers\Interfaces\ModifiersServiceInterface;
use Zenky\Modifiers\Interfaces\ModifierInterface;
use Zenky\Modifiers\Interfaces\Responses\PaginatedModifiersResponseInterface;
use Zenky\Modifiers\Responses\PaginatedModifiersResponse;
use Zenky\Stores\Interfaces\StoreInterface;

class ModifiersService extends AbstractApiService implements ModifiersServiceInterface
{
    protected function getRootUrl(StoreInterface $store, ApiRequestInterface $request): string
    {
        return 'modifiers';
    }

    public function create(StoreInterface $store, CreateRequestInterface $request): ModifierInterface
    {
        return $this->createEntity($store, $request, fn (array $data) => new Modifier($data));
    }

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedModifiersResponseInterface
    {
        return $this->listEntities($store, $request, PaginatedModifiersResponse::class, fn (array $data) => new Modifier($data));
    }

    public function show(StoreInterface $store, ShowRequestInterface $request): ModifierInterface
    {
        return $this->showEntity($store, $request, fn (array $data) => new Modifier($data));
    }

    public function update(StoreInterface $store, UpdateRequestInterface $request): ModifierInterface
    {
        return $this->updateEntity($store, $request, fn (array $data) => new Modifier($data));
    }

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void
    {
        $this->deleteEntity($store, $request);
    }
}
