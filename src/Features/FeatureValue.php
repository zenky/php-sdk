<?php

declare(strict_types=1);

namespace Zenky\Features;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\ExternalIdentifiers\Traits\IncludesExternalIdentifier;
use Zenky\Features\Interfaces\FeatureValueInterface;

class FeatureValue extends AbstractApiEntity implements FeatureValueInterface
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

    public function getRangeValue()
    {
        return $this->data['range_value'];
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
