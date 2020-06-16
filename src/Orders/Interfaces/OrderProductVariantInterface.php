<?php

declare(strict_types=1);

namespace Zenky\Orders\Interfaces;

use Zenky\Common\Interfaces\PriceInterface;
use Zenky\Products\Interfaces\ProductInterface;
use Zenky\Products\Interfaces\ProductVariantInterface;

interface OrderProductVariantInterface
{
    public function getProductId(): string;

    public function getProductVariantId(): string;

    public function getQuantity(): int;

    public function getTotalPrice(): PriceInterface;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;

    public function getProduct(): ?ProductInterface;

    public function getVariant(): ?ProductVariantInterface;
}
