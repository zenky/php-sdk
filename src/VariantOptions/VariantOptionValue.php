<?php

declare(strict_types=1);

namespace Zenky\VariantOptions;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\ExternalIdentifiers\Traits\IncludesExternalIdentifier;
use Zenky\VariantOptions\Interfaces\VariantOptionInterface;
use Zenky\VariantOptions\Interfaces\VariantOptionValueInterface;

class VariantOptionValue extends AbstractApiEntity implements VariantOptionValueInterface
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

    public function getOption(): ?VariantOptionInterface
    {
        return $this->getAttributeEntity('option', fn (array $data) => new VariantOption($data));
    }
}
