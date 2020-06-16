<?php

declare(strict_types=1);

namespace Zenky\BonusesLevels;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\BonusesLevels\Interfaces\BonusesLevelInterface;
use Zenky\Common\Interfaces\PercentageInterface;
use Zenky\Common\Interfaces\PriceInterface;
use Zenky\Common\Percentage;
use Zenky\Common\Price;

class BonusesLevel extends AbstractApiEntity implements BonusesLevelInterface
{
    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getName(): ?string
    {
        return $this->data['name'];
    }

    public function getExpenses(): PriceInterface
    {
        return $this->getCachedEntity('expenses', fn () => new Price($this->data['expenses']));
    }

    public function getCashbackRate(): PercentageInterface
    {
        return $this->getAttributeEntity(
            'cashback_rate',
            fn (array $data) => new Percentage($data['value'], $data['percentage'])
        );
    }

    public function getPaymentRate(): PercentageInterface
    {
        return $this->getAttributeEntity(
            'payment_rate',
            fn (array $data) => new Percentage($data['value'], $data['percentage'])
        );
    }

    public function getCashierRewardRate(): PercentageInterface
    {
        return $this->getAttributeEntity(
            'cashier_reward_rate',
            fn (array $data) => new Percentage($data['value'], $data['percentage'])
        );
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
