<?php

declare(strict_types=1);

namespace Zenky\Addresses\Interfaces;

use Zenky\Common\GeoPosition;

interface AddressInterface
{
    public function getId(): string;

    public function getExternalId();

    public function getName(): ?string;

    public function getCountryCode(): ?string;

    public function getCountry(): ?string;

    public function getCity(): ?string;

    public function getCityWithoutType(): ?string;

    public function getStreet(): ?string;

    public function getStreetWithoutType(): ?string;

    public function getHouse(): ?string;

    public function getBlock(): ?string;

    public function getBlockWithoutType(): ?string;

    public function getFullAddress(): ?string;

    public function getCoordinates(): ?GeoPosition;

    public function getApartment(): ?string;

    public function getEntrance(): ?string;

    public function getFloor(): ?string;

    public function hasIntercom(): bool;

    public function getIntercomCode(): ?string;

    public function getNotes(): ?string;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;
}
