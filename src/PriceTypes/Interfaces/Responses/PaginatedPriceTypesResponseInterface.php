<?php

declare(strict_types=1);

namespace Zenky\PriceTypes\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\PriceTypes\Interfaces\PriceTypeInterface;

interface PaginatedPriceTypesResponseInterface extends PaginatedResponseInterface
{
    /** @return array|PriceTypeInterface[] */
    public function getItems(): array;
}
