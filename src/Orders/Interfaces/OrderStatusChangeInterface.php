<?php

declare(strict_types=1);

namespace Zenky\Orders\Interfaces;

use Zenky\OrderStatuses\Interfaces\OrderStatusInterface;
use Zenky\Users\Interfaces\UserInterface;

interface OrderStatusChangeInterface
{
    public function getId(): string;

    public function getOrderStatusId(): string;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getOrderStatus(): ?OrderStatusInterface;

    public function getUser(): ?UserInterface;
}
