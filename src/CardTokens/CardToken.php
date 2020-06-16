<?php

declare(strict_types=1);

namespace Zenky\CardTokens;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\CardTokens\Interfaces\BankInfoInterface;
use Zenky\CardTokens\Interfaces\CardTokenInterface;
use Zenky\Common\Enum;
use Zenky\Common\Interfaces\EnumInterface;

class CardToken extends AbstractApiEntity implements CardTokenInterface
{
    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getStoreId(): string
    {
        return $this->data['store_id'];
    }

    public function getCustomerId(): string
    {
        return $this->data['customer_id'];
    }

    public function getCustomerStoreProfileId(): string
    {
        return $this->data['customer_store_profile_id'];
    }

    public function getAcquiringType(): EnumInterface
    {
        return $this->getCachedEntity(
            'acquiring_type',
            fn () => Enum::make($this->data['acquiring_type'])
        );
    }

    public function getCardType(): ?string
    {
        return $this->data['card_type'];
    }

    public function getCardFirstSix(): ?string
    {
        return $this->data['card_first_six'];
    }

    public function getCardLastFour(): ?string
    {
        return $this->data['card_last_four'];
    }

    public function getName(): ?string
    {
        return $this->data['name'];
    }

    public function getBank(): BankInfoInterface
    {
        return $this->getAttributeEntity('bank', fn (array $data) => new BankInfo($data));
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
