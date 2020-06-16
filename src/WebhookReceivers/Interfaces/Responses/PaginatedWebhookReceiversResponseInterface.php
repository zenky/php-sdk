<?php

declare(strict_types=1);

namespace Zenky\WebhookReceivers\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\WebhookReceivers\Interfaces\WebhookReceiverInterface;

interface PaginatedWebhookReceiversResponseInterface extends PaginatedResponseInterface
{
    /** @return array|WebhookReceiverInterface[] */
    public function getItems(): array;
}
