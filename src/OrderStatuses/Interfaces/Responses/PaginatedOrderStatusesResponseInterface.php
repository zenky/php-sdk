<?php

declare(strict_types=1);

namespace Zenky\OrderStatuses\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\OrderStatuses\Interfaces\OrderStatusInterface;

interface PaginatedOrderStatusesResponseInterface extends PaginatedResponseInterface
{
    /** @return array|OrderStatusInterface[] */
    public function getItems(): array;
}
