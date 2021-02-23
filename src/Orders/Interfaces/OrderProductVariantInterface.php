<?php

declare(strict_types=1);

namespace Zenky\Orders\Interfaces;

use Zenky\Common\Interfaces\PriceInterface;
use Zenky\Products\Interfaces\ProductInterface;
use Zenky\Products\Interfaces\ProductVariantInterface;

interface OrderProductVariantInterface
{
    public function getId(): string;

    public function getProductId(): string;

    public function getProductVariantId(): string;

    public function getQuantity(): int;

    public function getTotalPrice(): PriceInterface;

    public function getUnitPrice(): PriceInterface;

    public function getOriginalTotalPrice(): ?PriceInterface;

    public function getOriginalUnitPrice(): ?PriceInterface;

    public function getModifiersHash(): ?string;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;

    public function getProduct(): ?ProductInterface;

    public function getVariant(): ?ProductVariantInterface;

    /** @return OrderProductVariantModifierInterface[] */
    public function getModifiers(): array;
}
