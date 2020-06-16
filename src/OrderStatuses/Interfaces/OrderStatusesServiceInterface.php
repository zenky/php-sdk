<?php

declare(strict_types=1);

namespace Zenky\OrderStatuses\Interfaces;

use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\OrderStatuses\Interfaces\Responses\PaginatedOrderStatusesResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface OrderStatusesServiceInterface
{
    public function create(StoreInterface $store, CreateRequestInterface $request): OrderStatusInterface;

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedOrderStatusesResponseInterface;

    public function show(StoreInterface $store, ShowRequestInterface $request): OrderStatusInterface;

    public function update(StoreInterface $store, UpdateRequestInterface $request): OrderStatusInterface;

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void;
}
