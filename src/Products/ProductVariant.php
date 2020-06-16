<?php

declare(strict_types=1);

namespace Zenky\Products;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Common\Interfaces\PriceInterface;
use Zenky\Common\Price;
use Zenky\ExternalIdentifiers\Traits\IncludesExternalIdentifier;
use Zenky\Products\Interfaces\ProductVariantInterface;
use Zenky\VariantOptions\VariantOptionValue;

class ProductVariant extends AbstractApiEntity implements ProductVariantInterface
{
    use IncludesExternalIdentifier;

    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getProductId(): string
    {
        return $this->data['product_id'];
    }

    public function getName(): ?string
    {
        return $this->data['name'];
    }

    public function getSku(): ?string
    {
        return $this->data['sku'];
    }

    public function getBarcode(): ?string
    {
        return $this->data['barcode'];
    }

    public function getPrice(): PriceInterface
    {
        return $this->getCachedEntity('price', fn () => new Price($this->data['price']));
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('created_at');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('updated_at');
    }

    public function getVariantPrices(): array
    {
        return $this->getAttributeCollection(
            'prices',
            fn (array $data) => new ProductVariantPrice($data)
        );
    }

    public function getVariantOptionValues(): array
    {
        return $this->getAttributeCollection(
            'option_values',
            fn (array $data) => new VariantOptionValue($data)
        );
    }

    public function getRemainders(): array
    {
        return $this->getAttributeCollection(
            'remainders',
            fn (array $data) => new ProductVariantRemainder($data)
        );
    }

    public function getDimensions(): array
    {
        return $this->getAttributeCollection(
            'dimensions',
            fn (array $data) => new ProductVariantDimension($data)
        );
    }
}
