<?php

declare(strict_types=1);

namespace Zenky\Orders;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Common\Interfaces\PriceInterface;
use Zenky\Common\Price;
use Zenky\Orders\Interfaces\OrderProductVariantInterface;
use Zenky\Products\Interfaces\ProductInterface;
use Zenky\Products\Interfaces\ProductVariantInterface;
use Zenky\Products\Product;
use Zenky\Products\ProductVariant;

class OrderProductVariant extends AbstractApiEntity implements OrderProductVariantInterface
{
    public function getId(): string
    {
        return $this->data['uuid'];
    }

    public function getProductId(): string
    {
        return $this->data['product_id'];
    }

    public function getProductVariantId(): string
    {
        return $this->data['product_variant_id'];
    }

    public function getQuantity(): int
    {
        return $this->data['quantity'];
    }

    public function getTotalPrice(): PriceInterface
    {
        return $this->getCachedEntity('total_price', fn () => new Price($this->data['total_price']));
    }

    public function getUnitPrice(): PriceInterface
    {
        return $this->getCachedEntity('unit_price', fn () => new Price($this->data['unit_price']));
    }

    public function getOriginalTotalPrice(): ?PriceInterface
    {
        return $this->getAttributeEntity('original_total_price', fn () => new Price($this->data['original_total_price']));
    }

    public function getOriginalUnitPrice(): ?PriceInterface
    {
        return $this->getAttributeEntity('original_unit_price', fn () => new Price($this->data['original_unit_price']));
    }

    public function getModifiersHash(): ?string
    {
        return $this->data['modifiers_hash'];
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('created_at');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('updated_at');
    }

    public function getProduct(): ?ProductInterface
    {
        return $this->getAttributeEntity('product', fn (array $data) => new Product($data));
    }

    public function getVariant(): ?ProductVariantInterface
    {
        return $this->getAttributeEntity('variant', fn (array $data) => new ProductVariant($data));
    }

    public function getModifiers(): array
    {
        return $this->getAttributeCollection('modifiers', fn (array $data) => new OrderProductVariantModifier($data));
    }
}
