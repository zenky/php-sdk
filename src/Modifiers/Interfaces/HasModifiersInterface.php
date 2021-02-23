<?php

declare(strict_types=1);

namespace Zenky\Modifiers\Interfaces;

interface HasModifiersInterface
{
    /** @return ProductModifierInterface[] */
    public function getModifiers(): array;
}
