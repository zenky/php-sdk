<?php

declare(strict_types=1);

namespace Zenky\Modifiers\Interfaces;

interface ProductModifiersGroupInterface
{
    public function getModifiersGroup(): ?ModifiersGroupInterface;

    public function getMinQuantity(): int;

    public function getMaxQuantity(): int;

    public function isRequired(): bool;

    /** @return ProductModifierInterface[] */
    public function getProductModifiers(): array;
}
