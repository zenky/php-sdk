<?php

declare(strict_types=1);

namespace Zenky\Customers;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Common\Enum;
use Zenky\Common\Interfaces\EnumInterface;
use Zenky\Common\Interfaces\PhoneInterface;
use Zenky\Common\Phone;
use Zenky\Customers\Interfaces\CustomerInterface;
use Zenky\ExternalIdentifiers\Traits\IncludesExternalIdentifier;

class Customer extends AbstractApiEntity implements CustomerInterface
{
    use IncludesExternalIdentifier;

    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getStoreProfileId(): string
    {
        return $this->data['store_profile_id'];
    }

    public function getFirstName(): ?string
    {
        return $this->data['first_name'];
    }

    public function getLastName(): ?string
    {
        return $this->data['last_name'];
    }

    public function getFullName(): ?string
    {
        return $this->data['full_name'];
    }

    public function getPhone(): PhoneInterface
    {
        return $this->getCachedEntity('phone', fn () => new Phone($this->data['phone']));
    }

    public function getGender(): EnumInterface
    {
        return $this->getCachedEntity('gender', fn () => Enum::make($this->data['gender']));
    }

    public function getBithDate(): ?\DateTimeImmutable
    {
        return $this->getDateTimeInstance('birth_date');
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
