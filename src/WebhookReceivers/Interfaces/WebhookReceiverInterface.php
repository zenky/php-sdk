<?php

declare(strict_types=1);

namespace Zenky\WebhookReceivers\Interfaces;

interface WebhookReceiverInterface
{
    public function getId(): string;

    public function getUrl(): string;

    /** @return array|WebhookTypeInterface[] */
    public function getWebhooKTypes(): array;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;
}
