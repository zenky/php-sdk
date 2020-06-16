<?php

declare(strict_types=1);

namespace Zenky\Categories;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Categories\Interfaces\CategoryInterface;
use Zenky\Categories\Interfaces\CategorySettingsInterface;
use Zenky\ExternalIdentifiers\Traits\IncludesExternalIdentifier;
use Zenky\Media\Interfaces\MediaInterface;
use Zenky\Media\Traits\IncludesMedia;

class Category extends AbstractApiEntity implements CategoryInterface
{
    use IncludesExternalIdentifier;
    use IncludesMedia;

    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getShortId(): string
    {
        return $this->data['short_id'];
    }

    public function getParentId(): ?string
    {
        return $this->data['parent_id'];
    }

    public function getSlug(): ?string
    {
        return $this->data['slug'];
    }

    public function getName(): ?string
    {
        return $this->data['name'];
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

    public function getSettings(): ?CategorySettingsInterface
    {
        return $this->getAttributeEntity('settings', fn (array $data) => new CategorySettings($data));
    }

    public function getCoverImage(): ?MediaInterface
    {
        return $this->getMediaInstance('cover');
    }
}
