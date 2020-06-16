<?php

declare(strict_types=1);

namespace Zenky\OrderStatuses;

use Zenky\Api\AbstractApiService;
use Zenky\Api\Interfaces\Requests\ApiRequestInterface;
use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\OrderStatuses\Interfaces\OrderStatusesServiceInterface;
use Zenky\OrderStatuses\Interfaces\OrderStatusInterface;
use Zenky\OrderStatuses\Interfaces\Responses\PaginatedOrderStatusesResponseInterface;
use Zenky\OrderStatuses\Responses\PaginatedOrderStatusesResponse;
use Zenky\Stores\Interfaces\StoreInterface;

class OrderStatusesService extends AbstractApiService implements OrderStatusesServiceInterface
{
    protected function getRootUrl(StoreInterface $store, ApiRequestInterface $request): string
    {
        return 'order-statuses';
    }

    public function create(StoreInterface $store, CreateRequestInterface $request): OrderStatusInterface
    {
        return $this->createEntity($store, $request, fn (array $data) => new OrderStatus($data));
    }

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedOrderStatusesResponseInterface
    {
        return $this->listEntities($store, $request, PaginatedOrderStatusesResponse::class, fn (array $data) => new OrderStatus($data));
    }

    public function show(StoreInterface $store, ShowRequestInterface $request): OrderStatusInterface
    {
        return $this->showEntity($store, $request, fn (array $data) => new OrderStatus($data));
    }

    public function update(StoreInterface $store, UpdateRequestInterface $request): OrderStatusInterface
    {
        return $this->updateEntity($store, $request, fn (array $data) => new OrderStatus($data));
    }

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void
    {
        $this->deleteEntity($store, $request);
    }
}
