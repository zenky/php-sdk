<?php

declare(strict_types=1);

namespace Zenky\Features;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Common\Enum;
use Zenky\Common\Interfaces\EnumInterface;
use Zenky\ExternalIdentifiers\Traits\IncludesExternalIdentifier;
use Zenky\Features\Interfaces\FeatureInterface;

class Feature extends AbstractApiEntity implements FeatureInterface
{
    use IncludesExternalIdentifier;

    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getName(): ?string
    {
        return $this->data['name'];
    }

    public function isFilterable(): bool
    {
        return $this->data['filterable'] === true;
    }

    public function getFieldType(): EnumInterface
    {
        return $this->getCachedEntity('field_type', fn () => Enum::make($this->data['field_type']));
    }

    public function getRangeType(): ?EnumInterface
    {
        return $this->getCachedEntity('range_type', fn () => Enum::make($this->data['range_type']));
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('created_at');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('updated_at');
    }

    public function getValues(): array
    {
        return $this->getAttributeCollection('values', fn (array $data) => new FeatureValue($data));
    }
}
