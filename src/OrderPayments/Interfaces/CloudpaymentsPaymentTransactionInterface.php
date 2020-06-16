<?php

declare(strict_types=1);

namespace Zenky\OrderPayments\Interfaces;

interface CloudpaymentsPaymentTransactionInterface
{
    public function getWidgetParams(): array;

    public function getPaymentPageUrl(): ?string;
}
