<?php

declare(strict_types=1);

namespace Zenky\Cities\Interfaces;

use Zenky\Common\Interfaces\GeoPositionInterface;
use Zenky\Contacts\Interfaces\HasContacts;
use Zenky\DeliveryZones\Interfaces\HasDeliveryZones;
use Zenky\Stocks\Interfaces\StockInterface;

interface CityInterface extends HasContacts, HasDeliveryZones
{
    public function getId(): string;

    public function getName(): ?string;

    public function getTimezone(): ?\DateTimeZone;

    public function getCenter(): ?GeoPositionInterface;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;

    /** @return array|StockInterface[] */
    public function getStocks(): array;
}
