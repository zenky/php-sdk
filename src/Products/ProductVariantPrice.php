<?php

declare(strict_types=1);

namespace Zenky\Products;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Common\Interfaces\PriceInterface;
use Zenky\Common\Price;
use Zenky\PriceTypes\Interfaces\PriceTypeInterface;
use Zenky\PriceTypes\PriceType;
use Zenky\Products\Interfaces\ProductVariantPriceInterface;
use Zenky\Stocks\Interfaces\StockInterface;
use Zenky\Stocks\Stock;

class ProductVariantPrice extends AbstractApiEntity implements ProductVariantPriceInterface
{
    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getPriceTypeId(): string
    {
        return $this->data['price_type_id'];
    }

    public function getStockId(): ?string
    {
        return $this->data['stock_id'];
    }

    public function getPrice(): PriceInterface
    {
        return $this->getCachedEntity('price', fn () => new Price($this->data['price']));
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('created_at');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('updated_at');
    }

    public function getPriceType(): ?PriceTypeInterface
    {
        return $this->getAttributeEntity('price_type', fn (array $data) => new PriceType($data));
    }

    public function getStock(): ?StockInterface
    {
        return $this->getAttributeEntity('stock', fn (array $data) => new Stock($data));
    }
}
