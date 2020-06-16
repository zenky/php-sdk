<?php

declare(strict_types=1);

namespace Zenky\CardTokens\Interfaces;

use Zenky\Common\Interfaces\EnumInterface;

interface CardTokenInterface
{
    public function getId(): string;

    public function getStoreId(): string;

    public function getCustomerId(): string;

    public function getCustomerStoreProfileId(): string;

    public function getAcquiringType(): EnumInterface;

    public function getCardType(): ?string;

    public function getCardFirstSix(): ?string;

    public function getCardLastFour(): ?string;

    public function getName(): ?string;

    public function getBank(): BankInfoInterface;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;
}
