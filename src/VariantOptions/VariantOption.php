<?php

declare(strict_types=1);

namespace Zenky\VariantOptions;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\ExternalIdentifiers\Traits\IncludesExternalIdentifier;
use Zenky\VariantOptions\Interfaces\VariantOptionInterface;

class VariantOption extends AbstractApiEntity implements VariantOptionInterface
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
        return $this->getAttributeCollection('values', fn (array $data) => new VariantOptionValue($data));
    }
}
