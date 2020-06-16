<?php

declare(strict_types=1);

namespace Zenky\DeliveryZones\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\DeliveryZones\Interfaces\DeliveryZoneInterface;

interface PaginatedDeliveryZonesResponseInterface extends PaginatedResponseInterface
{
    /** @return array|DeliveryZoneInterface[] */
    public function getItems(): array;
}
