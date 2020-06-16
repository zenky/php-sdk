<?php

declare(strict_types=1);

namespace Zenky\OrderPayments\Interfaces;

interface OrderPaymentTransactionMetaInterface
{
    public function getCashMeta(): ?CashPaymentTransactionMetaInterface;

    public function getCloudpaymentsMeta(): ?CloudpaymentsPaymentTransactionInterface;
}
