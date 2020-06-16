<?php

declare(strict_types=1);

namespace Zenky\WebhookReceivers;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\WebhookReceivers\Interfaces\WebhookTypeInterface;

class WebhookType extends AbstractEntity implements WebhookTypeInterface
{
    public function getType(): string
    {
        return $this->data['type'];
    }

    public function getName(): string
    {
        return $this->data['title'];
    }

    public function getDescription(): string
    {
        return $this->data['description'];
    }
}
