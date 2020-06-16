<?php

declare(strict_types=1);

namespace Zenky\DeliveryZones\Interfaces;

interface HasDeliveryZones
{
    /** @return array|DeliveryZoneInterface[] */
    public function getDeliveryZones(): array;
}
