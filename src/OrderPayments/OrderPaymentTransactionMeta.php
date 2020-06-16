<?php

declare(strict_types=1);

namespace Zenky\OrderPayments;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\OrderPayments\Interfaces\CashPaymentTransactionMetaInterface;
use Zenky\OrderPayments\Interfaces\CloudpaymentsPaymentTransactionInterface;
use Zenky\OrderPayments\Interfaces\OrderPaymentTransactionMetaInterface;

class OrderPaymentTransactionMeta extends AbstractEntity implements OrderPaymentTransactionMetaInterface
{
    public function getCashMeta(): ?CashPaymentTransactionMetaInterface
    {
        return $this->getAttributeEntity('cash', fn (array $data) => new CashPaymentTransactionMeta($data));
    }

    public function getCloudpaymentsMeta(): ?CloudpaymentsPaymentTransactionInterface
    {
        return $this->getAttributeEntity(
            'cloudpayments',
            fn (array $data) => new CloudpaymentsPaymentTransactionMeta($data)
        );
    }
}
