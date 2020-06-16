<?php

declare(strict_types=1);

namespace Zenky\Products\Interfaces;

interface ProductVariantRemainderInterface
{
    public function getStockId(): string;

    public function getQuantity(): int;
}
