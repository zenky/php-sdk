<?php

declare(strict_types=1);

namespace Zenky\CardTokens\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\CardTokens\Interfaces\CardTokenInterface;

interface PaginatedCardTokensResponseInterface extends PaginatedResponseInterface
{
    /** @return array|CardTokenInterface[] */
    public function getItems(): array;
}
