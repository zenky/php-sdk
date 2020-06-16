<?php

declare(strict_types=1);

namespace Zenky\DeliveryZones\Interfaces;

use Zenky\Common\GeoPosition;

interface DeliveryZoneInterface
{
    public function getId(): string;

    public function getCityId(): string;

    public function getStockId(): string;

    public function getName(): ?string;

    /** @return array|GeoPosition[] */
    public function getCoordinates(): array;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;
}
