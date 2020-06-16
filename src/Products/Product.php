<?php

declare(strict_types=1);

namespace Zenky\Products;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Categories\Category;
use Zenky\Common\Enum;
use Zenky\Common\Interfaces\EnumInterface;
use Zenky\Common\Interfaces\WeightInterface;
use Zenky\Common\Weight;
use Zenky\ExternalIdentifiers\Traits\IncludesExternalIdentifier;
use Zenky\Media\Media;
use Zenky\Products\Interfaces\ProductInterface;
use Zenky\Products\Interfaces\ProductSettingsInterface;

class Product extends AbstractApiEntity implements ProductInterface
{
    use IncludesExternalIdentifier;

    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getShortId(): string
    {
        return $this->data['short_id'];
    }

    public function getSlug(): ?string
    {
        return $this->data['slug'];
    }

    public function getName(): ?string
    {
        return $this->data['name'];
    }

    public function getDescription(): ?string
    {
        return $this->data['description'];
    }

    public function getUnitType(): EnumInterface
    {
        return $this->getCachedEntity('unit_type', fn () => Enum::make($this->data['unit_type']));
    }

    public function getWeight(): WeightInterface
    {
        return $this->getCachedEntity('weight', fn () => new Weight($this->data['weight']));
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('created_at');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('updated_at');
    }

    public function getVariants(): array
    {
        return $this->getAttributeCollection('variants', fn (array $data) => new ProductVariant($data));
    }

    public function getFeatures(): array
    {
        return $this->getAttributeCollection('features', fn (array $data) => new ProductFeature($data));
    }

    public function getCategories(): array
    {
        return $this->getAttributeCollection('categories', fn (array $data) => new Category($data));
    }

    public function getMedia(): array
    {
        return $this->getAttributeCollection('media', fn (array $data) => new Media($data));
    }

    public function getSettings(): ?ProductSettingsInterface
    {
        return $this->getAttributeEntity('settings', fn () => new ProductSettings($this->data['settings']));
    }
}
