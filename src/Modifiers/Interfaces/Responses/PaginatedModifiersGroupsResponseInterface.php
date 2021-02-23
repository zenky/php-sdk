<?php

declare(strict_types=1);

namespace Zenky\Modifiers\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\Modifiers\Interfaces\ModifiersGroupInterface;

interface PaginatedModifiersGroupsResponseInterface extends PaginatedResponseInterface
{
    /** @return array|ModifiersGroupInterface[] */
    public function getItems(): array;
}
