<?php

declare(strict_types=1);

namespace Zenky\SalesChannels\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\SalesChannels\Interfaces\SalesChannelInterface;

interface PaginatedSalesChannelsResponseInterface extends PaginatedResponseInterface
{
    /** @return array|SalesChannelInterface[] */
    public function getItems(): array;
}
