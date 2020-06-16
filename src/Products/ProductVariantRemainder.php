<?php

declare(strict_types=1);

namespace Zenky\Products;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Products\Interfaces\ProductVariantRemainderInterface;

class ProductVariantRemainder extends AbstractApiEntity implements ProductVariantRemainderInterface
{
    public function getStockId(): string
    {
        return $this->data['stock_id'];
    }

    public function getQuantity(): int
    {
        return $this->data['quantity'];
    }
}
