<?php

declare(strict_types=1);

namespace Zenky\OrderPayments;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\Common\Interfaces\PriceInterface;
use Zenky\Common\Price;
use Zenky\OrderPayments\Interfaces\CashPaymentTransactionMetaInterface;

class CashPaymentTransactionMeta extends AbstractEntity implements CashPaymentTransactionMetaInterface
{
    public function getChange(): ?PriceInterface
    {
        return $this->getAttributeEntity('change', fn (array $data) => new Price($data));
    }
}
