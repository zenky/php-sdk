<?php

declare(strict_types=1);

namespace Zenky\Modifiers;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Modifiers\Interfaces\ModifiersGroupInterface;
use Zenky\Modifiers\Interfaces\ProductModifierInterface;
use Zenky\Modifiers\Interfaces\ProductModifiersGroupInterface;

class ProductModifiersGroup extends AbstractApiEntity implements ProductModifiersGroupInterface
{
    public function getModifiersGroup(): ?ModifiersGroupInterface
    {
        return $this->getAttributeEntity('group', fn (array $data) => new ModifiersGroup($data));
    }

    public function getMinQuantity(): int
    {
        return $this->data['min_quantity'];
    }

    public function getMaxQuantity(): int
    {
        return $this->data['max_quantity'];
    }

    public function isRequired(): bool
    {
        return $this->data['is_required'] === true;
    }

    /** @return ProductModifierInterface[] */
    public function getProductModifiers(): array
    {
        return $this->getAttributeCollection('modifiers', fn (array $data) => new ProductModifier($data));
    }
}
