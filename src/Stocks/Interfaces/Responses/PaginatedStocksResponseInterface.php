<?php

declare(strict_types=1);

namespace Zenky\Stocks\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\Stocks\Interfaces\StockInterface;

interface PaginatedStocksResponseInterface extends PaginatedResponseInterface
{
    /** @return array|StockInterface[] */
    public function getItems(): array;
}
