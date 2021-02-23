<?php

declare(strict_types=1);

namespace Zenky\Modifiers\Interfaces;

interface HasModifiersGroupsInterface
{
    /** @return ProductModifiersGroupInterface[] */
    public function getModifiersGroups(): array;
}
