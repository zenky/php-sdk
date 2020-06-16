<?php

declare(strict_types=1);

namespace Zenky\Stocks\Interfaces;

use Zenky\Addresses\Interfaces\HasAddress;
use Zenky\Contacts\Interfaces\HasContacts;
use Zenky\DeliveryZones\Interfaces\HasDeliveryZones;
use Zenky\ExternalIdentifiers\Interfaces\HasExternalIdentifier;
use Zenky\Schedule\Interfaces\ScheduleInterface;

interface StockInterface extends HasContacts, HasExternalIdentifier, HasDeliveryZones, HasAddress
{
    public function getId(): string;

    public function getName(): ?string;

    public function getPublicName(): ?string;

    public function getDescription(): ?string;

    public function isHidden(): bool;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;

    public function getSchedule(): ?ScheduleInterface;
}
