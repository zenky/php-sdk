<?php

declare(strict_types=1);

namespace Zenky\WebhookReceivers\Interfaces;

use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\WebhookReceivers\Interfaces\Responses\PaginatedWebhookReceiversResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface WebhookReceiversServiceInterface
{
    public function create(StoreInterface $store, CreateRequestInterface $request): WebhookReceiverInterface;

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedWebhookReceiversResponseInterface;

    public function show(StoreInterface $store, ShowRequestInterface $request): WebhookReceiverInterface;

    public function update(StoreInterface $store, UpdateRequestInterface $request): WebhookReceiverInterface;

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void;
}
