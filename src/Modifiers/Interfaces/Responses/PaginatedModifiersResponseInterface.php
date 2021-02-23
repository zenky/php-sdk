<?php

declare(strict_types=1);

namespace Zenky\Modifiers\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\Modifiers\Interfaces\ModifierInterface;

interface PaginatedModifiersResponseInterface extends PaginatedResponseInterface
{
    /** @return array|ModifierInterface[] */
    public function getItems(): array;
}
