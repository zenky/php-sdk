<?php

declare(strict_types=1);

namespace Zenky\Modifiers\Traits;

use Zenky\Modifiers\ProductModifier;

trait IncludesModifiers
{
    public function getModifiers(): array
    {
        return $this->getAttributeCollection('modifiers', fn (array $data) => new ProductModifier($data));
    }
}
