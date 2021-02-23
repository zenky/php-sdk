<?php

declare(strict_types=1);

namespace Zenky\Modifiers;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Modifiers\Interfaces\ModifierInterface;
use Zenky\Modifiers\Interfaces\ProductModifierInterface;

class ProductModifier extends AbstractApiEntity implements ProductModifierInterface
{
    public function getModifier(): ModifierInterface
    {
        return $this->getAttributeEntity('modifier', fn (array $data) => new Modifier($data));
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
}
