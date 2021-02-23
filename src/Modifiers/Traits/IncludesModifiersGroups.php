<?php

declare(strict_types=1);

namespace Zenky\Modifiers\Traits;

use Zenky\Modifiers\ProductModifiersGroup;

trait IncludesModifiersGroups
{
    public function getModifiersGroups(): array
    {
        return $this->getAttributeCollection('modifiers_groups', fn (array $data) => new ProductModifiersGroup($data));
    }
}
