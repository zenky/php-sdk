<?php

declare(strict_types=1);

namespace Zenky\NotificationReceivers\Interfaces;

use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\NotificationReceivers\Interfaces\Responses\PaginatedNotificationReceiversResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface NotificationReceiversServiceInterface
{
    public function create(StoreInterface $store, CreateRequestInterface $request): NotificationReceiverInterface;

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedNotificationReceiversResponseInterface;

    public function show(StoreInterface $store, ShowRequestInterface $request): NotificationReceiverInterface;

    public function update(StoreInterface $store, UpdateRequestInterface $request): NotificationReceiverInterface;

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void;
}
