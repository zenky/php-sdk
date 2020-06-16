<?php

declare(strict_types=1);

namespace Zenky\Orders;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Orders\Interfaces\OrderStatusProgressInterface;
use Zenky\OrderStatuses\Interfaces\OrderStatusInterface;
use Zenky\OrderStatuses\OrderStatus;

class OrderStatusProgress extends AbstractApiEntity implements OrderStatusProgressInterface
{
    public function getOrderStatusId(): string
    {
        return $this->data['status_id'];
    }

    public function getCompletedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('completed_at');
    }

    public function getOrderStatus(): ?OrderStatusInterface
    {
        return $this->getAttributeEntity('status', fn (array $data) => new OrderStatus($data));
    }
}
