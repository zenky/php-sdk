<?php

declare(strict_types=1);

namespace Zenky\Orders\Interfaces;

use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Orders\Interfaces\Requests\OrderRequestInterface;
use Zenky\Orders\Interfaces\Responses\PaginatedOrdersResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface OrdersServiceInterface
{
    public function create(StoreInterface $store, CreateRequestInterface $request): OrderInterface;

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedOrdersResponseInterface;

    public function show(StoreInterface $store, ShowRequestInterface $request): OrderInterface;

    public function update(StoreInterface $store, UpdateRequestInterface $request): OrderInterface;

    public function submit(StoreInterface $store, OrderRequestInterface $request): OrderInterface;

    public function confirm(StoreInterface $store, OrderRequestInterface $request): OrderInterface;

    public function resendConfirmationCode(StoreInterface $store, OrderRequestInterface $request): OrderInterface;

    public function attachCustomer(StoreInterface $store, OrderRequestInterface $request): OrderInterface;

    public function attachDeliveryAddress(StoreInterface $store, OrderRequestInterface $request): OrderInterface;

    public function attachCity(StoreInterface $store, OrderRequestInterface $request): OrderInterface;

    public function attachStock(StoreInterface $store, OrderRequestInterface $request): OrderInterface;

    public function updateNotes(StoreInterface $store, OrderRequestInterface $request): OrderInterface;

    public function updateDeliveryMethod(StoreInterface $store, OrderRequestInterface $request): OrderInterface;

    public function assignNumber(StoreInterface $store, OrderRequestInterface $request): OrderInterface;
}
