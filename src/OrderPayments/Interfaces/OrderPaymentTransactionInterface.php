<?php

declare(strict_types=1);

namespace Zenky\OrderPayments\Interfaces;

use Zenky\Common\Interfaces\EnumInterface;
use Zenky\Common\Interfaces\PriceInterface;

interface OrderPaymentTransactionInterface
{
    public function getId(): string;

    public function getUserId(): ?string;

    public function getExternalId(): ?string;

    public function getParentId(): ?string;

    public function getType(): EnumInterface;

    public function getStatus(): EnumInterface;

    public function getMethod(): EnumInterface;

    public function getAmount(): PriceInterface;

    public function getMeta(): OrderPaymentTransactionMetaInterface;

    public function getConfirmedAt(): ?\DateTimeImmutable;

    public function getCancelledAt(): ?\DateTimeImmutable;

    public function getRefundedAt(): ?\DateTimeImmutable;

    public function getRefundFailedAt(): ?\DateTimeImmutable;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;
}
