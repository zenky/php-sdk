<?php

declare(strict_types=1);

namespace Zenky\Addresses;

use Zenky\Addresses\Interfaces\AddressInterface;
use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Common\GeoPosition;

class Address extends AbstractApiEntity implements AddressInterface
{
    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getExternalId()
    {
        return $this->data['external_id'];
    }

    public function getName(): ?string
    {
        return $this->data['name'];
    }

    public function getCountryCode(): ?string
    {
        return $this->data['country_code'];
    }

    public function getCountry(): ?string
    {
        return $this->data['country'];
    }

    public function getCity(): ?string
    {
        return $this->data['city'];
    }

    public function getCityWithoutType(): ?string
    {
        return $this->data['city_without_type'];
    }

    public function getStreet(): ?string
    {
        return $this->data['street'];
    }

    public function getStreetWithoutType(): ?string
    {
        return $this->data['street_without_type'];
    }

    public function getHouse(): ?string
    {
        return $this->data['house'];
    }

    public function getFullAddress(): ?string
    {
        return $this->data['full'];
    }

    public function getCoordinates(): ?GeoPosition
    {
        return $this->getCachedEntity('coordinates', function () {
            if (is_null($this->data['lat']) || is_null($this->data['lng'])) {
                return null;
            }

            return new GeoPosition(
                floatval($this->data['lat']),
                floatval($this->data['lng'])
            );
        });
    }

    public function getApartment(): ?string
    {
        return $this->data['apartment'];
    }

    public function getEntrance(): ?string
    {
        return $this->data['entrance'];
    }

    public function getFloor(): ?string
    {
        return $this->data['floor'];
    }

    public function hasIntercom(): bool
    {
        return $this->data['has_intercom'] === true;
    }

    public function getIntercomCode(): ?string
    {
        return $this->data['intercom_code'];
    }

    public function getNotes(): ?string
    {
        return $this->data['notes'];
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
