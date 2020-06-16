<?php

declare(strict_types=1);

namespace Zenky\Orders;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Orders\Interfaces\OrderStatusChangeInterface;
use Zenky\OrderStatuses\Interfaces\OrderStatusInterface;
use Zenky\OrderStatuses\OrderStatus;
use Zenky\Users\Interfaces\UserInterface;
use Zenky\Users\User;

class OrderStatusChange extends AbstractApiEntity implements OrderStatusChangeInterface
{
    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getOrderStatusId(): string
    {
        return $this->data['order_status_id'];
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('created_at');
    }

    public function getOrderStatus(): ?OrderStatusInterface
    {
        return $this->getAttributeEntity('status', fn (array $data) => new OrderStatus($data));
    }

    public function getUser(): ?UserInterface
    {
        return $this->getAttributeEntity('user', fn (array $data) => new User($data));
    }
}
