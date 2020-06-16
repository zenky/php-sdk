<?php

declare(strict_types=1);

namespace Zenky\OrderPayments\Interfaces;

use Zenky\Common\Interfaces\PriceInterface;

interface CashPaymentTransactionMetaInterface
{
    public function getChange(): ?PriceInterface;
}
