<?php

declare(strict_types=1);

namespace Zenky\WebhookReceivers;

use Zenky\Api\AbstractApiService;
use Zenky\Api\Interfaces\Requests\ApiRequestInterface;
use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\WebhookReceivers\Interfaces\WebhookReceiversServiceInterface;
use Zenky\WebhookReceivers\Interfaces\WebhookReceiverInterface;
use Zenky\WebhookReceivers\Interfaces\Responses\PaginatedWebhookReceiversResponseInterface;
use Zenky\WebhookReceivers\Responses\PaginatedWebhookReceiversResponse;
use Zenky\Stores\Interfaces\StoreInterface;

class WebhookReceiversService extends AbstractApiService implements WebhookReceiversServiceInterface
{
    protected function getRootUrl(StoreInterface $store, ApiRequestInterface $request): string
    {
        return 'store/webhook-receivers';
    }

    public function create(StoreInterface $store, CreateRequestInterface $request): WebhookReceiverInterface
    {
        return $this->createEntity($store, $request, fn (array $data) => new WebhookReceiver($data));
    }

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedWebhookReceiversResponseInterface
    {
        return $this->listEntities($store, $request, PaginatedWebhookReceiversResponse::class, fn (array $data) => new WebhookReceiver($data));
    }

    public function show(StoreInterface $store, ShowRequestInterface $request): WebhookReceiverInterface
    {
        return $this->showEntity($store, $request, fn (array $data) => new WebhookReceiver($data));
    }

    public function update(StoreInterface $store, UpdateRequestInterface $request): WebhookReceiverInterface
    {
        return $this->updateEntity($store, $request, fn (array $data) => new WebhookReceiver($data));
    }

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void
    {
        $this->deleteEntity($store, $request);
    }
}
