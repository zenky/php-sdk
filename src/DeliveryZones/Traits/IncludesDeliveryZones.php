<?php

declare(strict_types=1);

namespace Zenky\DeliveryZones\Traits;

use Zenky\DeliveryZones\DeliveryZone;

trait IncludesDeliveryZones
{
    public function getDeliveryZones(): array
    {
        return $this->getAttributeCollection('delivery_zones', fn (array $data) => new DeliveryZone($data));
    }
}
