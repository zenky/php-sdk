<?php

declare(strict_types=1);

namespace Zenky\Modifiers\Interfaces;

interface ProductModifierInterface
{
    public function getModifier(): ModifierInterface;

    public function getMinQuantity(): int;

    public function getMaxQuantity(): int;

    public function isRequired(): bool;
}
