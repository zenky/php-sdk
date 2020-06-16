<?php

declare(strict_types=1);

namespace Zenky\Users;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Common\Enum;
use Zenky\Common\Interfaces\EnumInterface;
use Zenky\Common\Interfaces\PhoneInterface;
use Zenky\Common\Phone;
use Zenky\Media\Interfaces\MediaInterface;
use Zenky\Media\Traits\IncludesMedia;
use Zenky\Stores\Interfaces\StoreInterface;
use Zenky\Stores\Store;
use Zenky\Users\Interfaces\UserInterface;

class User extends AbstractApiEntity implements UserInterface
{
    use IncludesMedia;

    public function getId(): string
    {
        return $this->data['id'];
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

    public function getEmail(): ?string
    {
        return $this->data['email'];
    }

    public function getPhone(): ?PhoneInterface
    {
        return $this->getAttributeEntity('phone', fn (array $data) => new Phone($data));
    }

    public function getPhoneCountry(): ?string
    {
        return $this->data['phone_country'];
    }

    public function getRole(): EnumInterface
    {
        return $this->getCachedEntity('role', fn () => Enum::make($this->data['role']));
    }

    public function getTimezone(): ?string
    {
        return $this->data['timezone'];
    }

    public function getLocale(): ?string
    {
        return $this->data['locale'];
    }

    public function getDefaultAvatarUrl(): string
    {
        return $this->data['default_avatar_url'];
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('created_at');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('updated_at');
    }

    public function getAvatarImage(): ?MediaInterface
    {
        return $this->getMediaInstance('avatar');
    }

    public function getStores(): array
    {
        return $this->getAttributeCollection('stores', fn (array $data) => new Store($data));
    }

    public function getSelectedStore(): ?StoreInterface
    {
        return $this->getAttributeEntity('selected_store', fn (array $data) => new Store($data));
    }
}
