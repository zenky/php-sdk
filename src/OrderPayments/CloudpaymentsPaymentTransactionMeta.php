<?php

declare(strict_types=1);

namespace Zenky\OrderPayments;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\OrderPayments\Interfaces\CloudpaymentsPaymentTransactionInterface;

class CloudpaymentsPaymentTransactionMeta extends AbstractEntity implements CloudpaymentsPaymentTransactionInterface
{
    public function getWidgetParams(): array
    {
        return $this->data['params'];
    }

    public function getPaymentPageUrl(): ?string
    {
        return $this->data['payment_page_url'];
    }
}
