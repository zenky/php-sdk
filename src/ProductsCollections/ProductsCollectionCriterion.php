<?php

declare(strict_types=1);

namespace Zenky\ProductsCollections;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\ProductsCollections\Interfaces\ProductsCollectionCriterionInterface;

class ProductsCollectionCriterion extends AbstractApiEntity implements ProductsCollectionCriterionInterface
{
    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getField(): ?string
    {
        return $this->data['field'];
    }

    public function getComparison(): ?string
    {
        return $this->data['comparison'];
    }

    public function getValue(): ?string
    {
        return $this->data['value'];
    }

    public function getFormattedValue(): ?string
    {
        return $this->data['formatted_value'];
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
