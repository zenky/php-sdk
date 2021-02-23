<?php

declare(strict_types=1);

namespace Zenky\Orders\Interfaces;

use Zenky\Common\Interfaces\PriceInterface;
use Zenky\Modifiers\Interfaces\ModifierInterface;
use Zenky\Modifiers\Interfaces\ModifiersGroupInterface;

interface OrderProductModifierInterface
{
    public function getId(): string;

    public function getStoreId(): string;

    public function getOrderId(): string;

    public function getProductId(): string;

    public function getProductVariantId(): string;

    public function getModifierId(): string;

    public function getModifiersGroupId(): ?string;

    public function getQuantity(): int;

    public function getTotalPrice(): PriceInterface;

    public function getUnitPrice(): PriceInterface;

    public function getOriginalTotalPrice(): PriceInterface;

    public function getOriginalUnitPrice(): PriceInterface;

    public function getModifier(): ?ModifierInterface;

    public function getModifiersGroup(): ?ModifiersGroupInterface;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;
}
