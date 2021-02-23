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
use Zenky\Modifiers\Interfaces\ModifiersGroupsServiceInterface;
use Zenky\Modifiers\Interfaces\ModifiersGroupInterface;
use Zenky\Modifiers\Interfaces\Responses\PaginatedModifiersGroupsResponseInterface;
use Zenky\Modifiers\Responses\PaginatedModifiersGroupsResponse;
use Zenky\Stores\Interfaces\StoreInterface;

class ModifiersGroupsService extends AbstractApiService implements ModifiersGroupsServiceInterface
{
    protected function getRootUrl(StoreInterface $store, ApiRequestInterface $request): string
    {
        return 'modifiers-groups';
    }

    public function create(StoreInterface $store, CreateRequestInterface $request): ModifiersGroupInterface
    {
        return $this->createEntity($store, $request, fn (array $data) => new ModifiersGroup($data));
    }

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedModifiersGroupsResponseInterface
    {
        return $this->listEntities($store, $request, PaginatedModifiersGroupsResponse::class, fn (array $data) => new ModifiersGroup($data));
    }

    public function show(StoreInterface $store, ShowRequestInterface $request): ModifiersGroupInterface
    {
        return $this->showEntity($store, $request, fn (array $data) => new ModifiersGroup($data));
    }

    public function update(StoreInterface $store, UpdateRequestInterface $request): ModifiersGroupInterface
    {
        return $this->updateEntity($store, $request, fn (array $data) => new ModifiersGroup($data));
    }

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void
    {
        $this->deleteEntity($store, $request);
    }
}
