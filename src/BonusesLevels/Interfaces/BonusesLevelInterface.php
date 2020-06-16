<?php

declare(strict_types=1);

namespace Zenky\BonusesLevels\Interfaces;

use Zenky\Common\Interfaces\PercentageInterface;
use Zenky\Common\Interfaces\PriceInterface;

interface BonusesLevelInterface
{
    public function getId(): string;

    public function getName(): ?string;

    public function getExpenses(): PriceInterface;

    public function getCashbackRate(): PercentageInterface;

    public function getPaymentRate(): PercentageInterface;

    public function getCashierRewardRate(): PercentageInterface;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;
}
