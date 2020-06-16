<?php

declare(strict_types=1);

namespace Zenky\NotificationReceivers\Interfaces;

use Zenky\Common\Interfaces\EnumInterface;

interface NotificationReceiverInterface
{
    public function getId(): string;

    public function getType(): EnumInterface;

    public function getValue();

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;
}
