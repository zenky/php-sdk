<?php

declare(strict_types=1);

namespace Zenky\Offers\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\Offers\Interfaces\OfferInterface;

interface PaginatedOffersResponseInterface extends PaginatedResponseInterface
{
    /** @return array|OfferInterface[] */
    public function getItems(): array;
}
