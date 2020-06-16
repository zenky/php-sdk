<?php

declare(strict_types=1);

namespace Zenky\WebhookReceivers\Interfaces;

interface WebhookTypeInterface
{
    public function getType(): string;

    public function getName(): string;

    public function getDescription(): string;
}
