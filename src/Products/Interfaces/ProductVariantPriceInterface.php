<?php

declare(strict_types=1);

namespace Zenky\Products\Interfaces;

use Zenky\Common\Interfaces\PriceInterface;
use Zenky\PriceTypes\Interfaces\PriceTypeInterface;
use Zenky\Stocks\Interfaces\StockInterface;

interface ProductVariantPriceInterface
{
    public function getId(): string;

    public function getPriceTypeId(): string;

    public function getStockId(): ?string;

    public function getPrice(): PriceInterface;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;

    public function getPriceType(): ?PriceTypeInterface;

    public function getStock(): ?StockInterface;
}
