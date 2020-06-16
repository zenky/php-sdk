<?php

declare(strict_types=1);

namespace Zenky\Products\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\Products\Interfaces\ProductInterface;

interface PaginatedProductsResponseInterface extends PaginatedResponseInterface
{
    /** @return array|ProductInterface[] */
    public function getItems(): array;
}
