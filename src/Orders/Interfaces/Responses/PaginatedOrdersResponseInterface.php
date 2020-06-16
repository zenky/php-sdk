<?php

declare(strict_types=1);

namespace Zenky\Orders\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\Orders\Interfaces\OrderInterface;

interface PaginatedOrdersResponseInterface extends PaginatedResponseInterface
{
    /** @return array|OrderInterface[] */
    public function getItems(): array;
}
