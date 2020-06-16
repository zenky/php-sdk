<?php

declare(strict_types=1);

namespace Zenky\DeliveryZones;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Common\GeoPosition;
use Zenky\DeliveryZones\Interfaces\DeliveryZoneInterface;

class DeliveryZone extends AbstractApiEntity implements DeliveryZoneInterface
{
    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getCityId(): string
    {
        return $this->data['city_id'];
    }

    public function getStockId(): string
    {
        return $this->data['stock_id'];
    }

    public function getName(): ?string
    {
        return $this->data['name'];
    }

    public function getCoordinates(): array
    {
        return $this->getAttributeCollection(
            'coordinates',
            fn (array $coords) => new GeoPosition(floatval($coords['latitude']), floatval($coords['longitude']))
        );
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('created_at');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('updated_at');
    }
}
