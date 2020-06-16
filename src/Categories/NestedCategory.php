<?php

declare(strict_types=1);

namespace Zenky\Categories;

use Zenky\Categories\Interfaces\NestedCategoryInterface;

class NestedCategory extends Category implements NestedCategoryInterface
{
    public function getChildren(): array
    {
        return $this->getAttributeCollection('children', fn (array $data) => new static($data));
    }
}
