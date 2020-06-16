<?php

declare(strict_types=1);

namespace Zenky\Stores;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Cities\Traits\IncludesCities;
use Zenky\Contacts\Traits\IncludesContacts;
use Zenky\Media\Interfaces\MediaInterface;
use Zenky\Media\Traits\IncludesMedia;
use Zenky\Stores\Interfaces\StoreInterface;
use Zenky\Stores\Interfaces\StoreSettingsInterface;

class Store extends AbstractApiEntity implements StoreInterface
{
    use IncludesContacts;
    use IncludesCities;
    use IncludesMedia;

    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getName(): ?string
    {
        return $this->data['name'];
    }

    public function getSlug(): ?string
    {
        return $this->data['slug'];
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('created_at');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('updated_at');
    }

    public function getLogoImage(): ?MediaInterface
    {
        return $this->getMediaInstance('logo');
    }

    public function getSettings(): ?StoreSettingsInterface
    {
        return $this->getAttributeEntity('settings', fn (array $data) => new StoreSettings($data));
    }
}
