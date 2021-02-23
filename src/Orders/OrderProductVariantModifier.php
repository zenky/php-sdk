<?php

declare(strict_types=1);

namespace Zenky\Orders;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Common\Interfaces\PriceInterface;
use Zenky\Common\Price;
use Zenky\Modifiers\Interfaces\ModifierInterface;
use Zenky\Modifiers\Interfaces\ModifiersGroupInterface;
use Zenky\Modifiers\Modifier;
use Zenky\Modifiers\ModifiersGroup;
use Zenky\Orders\Interfaces\OrderProductVariantModifierInterface;

class OrderProductVariantModifier extends AbstractApiEntity implements OrderProductVariantModifierInterface
{
    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getStoreId(): string
    {
        return $this->data['store_id'];
    }

    public function getOrderId(): string
    {
        return $this->data['order_id'];
    }

    public function getProductId(): string
    {
        return $this->data['product_id'];
    }

    public function getProductVariantId(): string
    {
        return $this->data['product_variant_id'];
    }

    public function getModifierId(): string
    {
        return $this->data['modifier_id'];
    }

    public function getModifiersGroupId(): ?string
    {
        return $this->data['modifiers_group_id'];
    }

    public function getQuantity(): int
    {
        return $this->data['quantity'];
    }

    public function getTotalPrice(): ?PriceInterface
    {
        return $this->getAttributeEntity('total_price', fn () => new Price($this->data['total_price']));
    }

    public function getUnitPrice(): ?PriceInterface
    {
        return $this->getAttributeEntity('unit_price', fn () => new Price($this->data['unit_price']));
    }

    public function getOriginalTotalPrice(): ?PriceInterface
    {
        return $this->getAttributeEntity('original_total_price', fn () => new Price($this->data['original_total_price']));
    }

    public function getOriginalUnitPrice(): ?PriceInterface
    {
        return $this->getAttributeEntity('original_unit_price', fn () => new Price($this->data['original_unit_price']));
    }

    public function getModifier(): ?ModifierInterface
    {
        return $this->getAttributeEntity('modifier', fn () => new Modifier($this->data['modifier']));
    }

    public function getModifiersGroup(): ?ModifiersGroupInterface
    {
        return $this->getAttributeEntity('modifiers_group', fn () => new ModifiersGroup($this->data['modifiers_group']));
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('created_at');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('updated_at');
    }
}
