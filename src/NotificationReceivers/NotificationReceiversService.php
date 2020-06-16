<?php

declare(strict_types=1);

namespace Zenky\NotificationReceivers;

use Zenky\Api\AbstractApiService;
use Zenky\Api\Interfaces\Requests\ApiRequestInterface;
use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\NotificationReceivers\Interfaces\NotificationReceiversServiceInterface;
use Zenky\NotificationReceivers\Interfaces\NotificationReceiverInterface;
use Zenky\NotificationReceivers\Interfaces\Responses\PaginatedNotificationReceiversResponseInterface;
use Zenky\NotificationReceivers\Responses\PaginatedNotificationReceiversResponse;
use Zenky\Stores\Interfaces\StoreInterface;

class NotificationReceiversService extends AbstractApiService implements NotificationReceiversServiceInterface
{
    protected function getRootUrl(StoreInterface $store, ApiRequestInterface $request): string
    {
        return 'notification-receivers';
    }

    public function create(StoreInterface $store, CreateRequestInterface $request): NotificationReceiverInterface
    {
        return $this->createEntity($store, $request, fn (array $data) => new NotificationReceiver($data));
    }

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedNotificationReceiversResponseInterface
    {
        return $this->listEntities($store, $request, PaginatedNotificationReceiversResponse::class, fn (array $data) => new NotificationReceiver($data));
    }

    public function show(StoreInterface $store, ShowRequestInterface $request): NotificationReceiverInterface
    {
        return $this->showEntity($store, $request, fn (array $data) => new NotificationReceiver($data));
    }

    public function update(StoreInterface $store, UpdateRequestInterface $request): NotificationReceiverInterface
    {
        return $this->updateEntity($store, $request, fn (array $data) => new NotificationReceiver($data));
    }

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void
    {
        $this->deleteEntity($store, $request);
    }
}
