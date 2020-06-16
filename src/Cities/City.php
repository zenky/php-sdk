<?php

declare(strict_types=1);

namespace Zenky\Cities;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Cities\Interfaces\CityInterface;
use Zenky\Common\GeoPosition;
use Zenky\Common\Interfaces\GeoPositionInterface;
use Zenky\Contacts\Traits\IncludesContacts;
use Zenky\DeliveryZones\Traits\IncludesDeliveryZones;
use Zenky\Stocks\Stock;

class City extends AbstractApiEntity implements CityInterface
{
    use IncludesContacts;
    use IncludesDeliveryZones;

    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getName(): ?string
    {
        return $this->data['name'];
    }

    public function getTimezone(): ?\DateTimeZone
    {
        return $this->getAttributeEntity('timezone', fn (string $timezone) => new \DateTimeZone($timezone));
    }

    public function getCenter(): ?GeoPositionInterface
    {
        return $this->getCachedEntity('center', function () {
            if (!$this->attributeFilled('lat') || !$this->attributeFilled('lng')) {
                return null;
            }

            return new GeoPosition(
                floatval($this->data['lat']),
                floatval($this->data['lng'])
            );
        });
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('created_at');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('updated_at');
    }

    public function getStocks(): array
    {
        return $this->getAttributeCollection('stocks', fn (array $data) => new Stock($data));
    }
}
