<?php

declare(strict_types=1);

namespace Zenky\Modifiers;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\ExternalIdentifiers\Traits\IncludesExternalIdentifier;
use Zenky\Modifiers\Interfaces\ModifiersGroupInterface;

class ModifiersGroup extends AbstractApiEntity implements ModifiersGroupInterface
{
    use IncludesExternalIdentifier;

    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getStoreId(): string
    {
        return $this->data['store_id'];
    }

    public function getName(): ?string
    {
        return $this->data['name'];
    }

    public function getDisplayName(): ?string
    {
        return $this->data['display_name'];
    }

    public function getModifiers(): array
    {
        return $this->getAttributeCollection('modifiers', fn (array $data) => new Modifier($data));
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
