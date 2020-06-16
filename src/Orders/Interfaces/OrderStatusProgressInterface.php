<?php

declare(strict_types=1);

namespace Zenky\Orders\Interfaces;

use Zenky\OrderStatuses\Interfaces\OrderStatusInterface;

interface OrderStatusProgressInterface
{
    public function getOrderStatusId(): string;

    public function getCompletedAt(): \DateTimeImmutable;

    public function getOrderStatus(): ?OrderStatusInterface;
}
