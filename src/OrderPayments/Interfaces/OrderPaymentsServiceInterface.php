<?php

declare(strict_types=1);

namespace Zenky\OrderPayments\Interfaces;

use Zenky\Orders\Interfaces\OrderInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface OrderPaymentsServiceInterface
{
    public function listPaymentMethods(StoreInterface $store, OrderInterface $order): array;
}
