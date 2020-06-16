<?php

declare(strict_types=1);

namespace Zenky\Orders\Requests;

use Zenky\Api\Requests\UpdateRequest;
use Zenky\Orders\Interfaces\OrderInterface;
use Zenky\Orders\Interfaces\Requests\OrderRequestInterface;

class OrderRequest extends UpdateRequest implements OrderRequestInterface
{
    protected OrderInterface $order;

    public function __construct(OrderInterface $order, array $payload = [])
    {
        parent::__construct($order->getId(), $payload);

        $this->order = $order;
    }

    public function getOrder(): OrderInterface
    {
        return $this->order;
    }
}
