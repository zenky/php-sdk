<?php

declare(strict_types=1);

namespace Zenky\ProductsCollections;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Media\Interfaces\MediaInterface;
use Zenky\Media\Traits\IncludesMedia;
use Zenky\Products\Product;
use Zenky\ProductsCollections\Interfaces\ProductsCollectionInterface;

class ProductsCollection extends AbstractApiEntity implements ProductsCollectionInterface
{
    use IncludesMedia;

    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getType(): string
    {
        return $this->data['type'];
    }

    public function getCriteriaMatch(): string
    {
        return $this->data['criterias_match'];
    }

    public function getName(): ?string
    {
        return $this->data['name'];
    }

    public function getDescription(): ?string
    {
        return $this->data['description'];
    }

    public function isVisibleInMobileApp(): bool
    {
        return $this->data['show_in_mobile'] === true;
    }

    public function getSorting(): int
    {
        return $this->data['sorting'];
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('created_at');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('updated_at');
    }

    public function getCriteria(): array
    {
        return $this->getAttributeCollection('criterias', fn (array $data) => new ProductsCollectionCriterion($data));
    }

    public function getProducts(): array
    {
        return $this->getAttributeCollection('products', fn (array $data) => new Product($data));
    }

    public function getCoverImage(): ?MediaInterface
    {
        return $this->getMediaInstance('cover');
    }
}
