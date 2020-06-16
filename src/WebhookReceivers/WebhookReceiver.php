<?php

declare(strict_types=1);

namespace Zenky\WebhookReceivers;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\WebhookReceivers\Interfaces\WebhookReceiverInterface;

class WebhookReceiver extends AbstractApiEntity implements WebhookReceiverInterface
{
    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getUrl(): string
    {
        return $this->data['url'];
    }

    public function getWebhooKTypes(): array
    {
        return $this->getAttributeCollection('webhook_types', fn (array $data) => new WebhookType($data));
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('created_at');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('updated_at');
    }
}
