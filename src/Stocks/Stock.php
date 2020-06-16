<?php

declare(strict_types=1);

namespace Zenky\Stocks;

use Zenky\Addresses\Address;
use Zenky\Addresses\Interfaces\AddressInterface;
use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Contacts\Traits\IncludesContacts;
use Zenky\DeliveryZones\Traits\IncludesDeliveryZones;
use Zenky\ExternalIdentifiers\Traits\IncludesExternalIdentifier;
use Zenky\Schedule\Interfaces\ScheduleInterface;
use Zenky\Schedule\Schedule;
use Zenky\Stocks\Interfaces\StockInterface;

class Stock extends AbstractApiEntity implements StockInterface
{
    use IncludesContacts;
    use IncludesDeliveryZones;
    use IncludesExternalIdentifier;

    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getName(): ?string
    {
        return $this->data['name'];
    }

    public function getPublicName(): ?string
    {
        return $this->data['display_name'];
    }

    public function getDescription(): ?string
    {
        return $this->data['description'];
    }

    public function isHidden(): bool
    {
        return $this->data['hidden'] === true;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('created_at');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('updated_at');
    }

    public function getAddress(): ?AddressInterface
    {
        return $this->getAttributeEntity('address', fn (array $data) => new Address($data));
    }

    public function getSchedule(): ?ScheduleInterface
    {
        return $this->getAttributeEntity('schedule', fn (array $data) => new Schedule($data));
    }
}
