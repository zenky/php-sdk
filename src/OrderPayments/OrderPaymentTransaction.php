<?php

declare(strict_types=1);

namespace Zenky\OrderPayments;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Common\Enum;
use Zenky\Common\Interfaces\EnumInterface;
use Zenky\Common\Interfaces\PriceInterface;
use Zenky\Common\Price;
use Zenky\OrderPayments\Interfaces\OrderPaymentTransactionInterface;
use Zenky\OrderPayments\Interfaces\OrderPaymentTransactionMetaInterface;

class OrderPaymentTransaction extends AbstractApiEntity implements OrderPaymentTransactionInterface
{
    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getUserId(): ?string
    {
        return $this->data['user_id'];
    }

    public function getExternalId(): ?string
    {
        return $this->data['external_id'];
    }

    public function getParentId(): ?string
    {
        return $this->data['parent_id'];
    }

    public function getType(): EnumInterface
    {
        return $this->getCachedEntity('type', fn () => Enum::make($this->data['type']));
    }

    public function getStatus(): EnumInterface
    {
        return $this->getCachedEntity('status', fn () => Enum::make($this->data['status']));
    }

    public function getMethod(): EnumInterface
    {
        return $this->getCachedEntity('method', fn () => Enum::make($this->data['method']));
    }

    public function getAmount(): PriceInterface
    {
        return $this->getCachedEntity('amount', fn () => new Price($this->data['amount']));
    }

    public function getMeta(): OrderPaymentTransactionMetaInterface
    {
        return $this->getAttributeEntity(
            'transaction_meta',
            fn (array $data) => new OrderPaymentTransactionMeta($data)
        );
    }

    public function getConfirmedAt(): ?\DateTimeImmutable
    {
        return $this->getDateTimeInstance('confirmed_at');
    }

    public function getCancelledAt(): ?\DateTimeImmutable
    {
        return $this->getDateTimeInstance('cancelled_at');
    }

    public function getRefundedAt(): ?\DateTimeImmutable
    {
        return $this->getDateTimeInstance('refunded_at');
    }

    public function getRefundFailedAt(): ?\DateTimeImmutable
    {
        return $this->getDateTimeInstance('refund_failed_at');
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('created_at');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('updated_at');
    }
}
