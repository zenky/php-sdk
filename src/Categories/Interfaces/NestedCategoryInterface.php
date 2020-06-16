<?php

declare(strict_types=1);

namespace Zenky\Categories\Interfaces;

interface NestedCategoryInterface extends CategoryInterface
{
    /** @return array|NestedCategoryInterface[] */
    public function getChildren(): array;
}
