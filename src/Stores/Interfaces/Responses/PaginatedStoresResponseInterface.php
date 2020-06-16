<?php

declare(strict_types=1);

namespace Zenky\Stores\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface PaginatedStoresResponseInterface extends PaginatedResponseInterface
{
    /** @return array|StoreInterface[] */
    public function getItems(): array;
}
