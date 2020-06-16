<?php

declare(strict_types=1);

namespace Zenky\Products;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Common\Enum;
use Zenky\Common\Interfaces\EnumInterface;
use Zenky\Products\Interfaces\ProductVariantDimensionInterface;

class ProductVariantDimension extends AbstractApiEntity implements ProductVariantDimensionInterface
{
    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getDimension(): EnumInterface
    {
        return $this->getCachedEntity('dimension', fn () => Enum::make($this->data['dimension']));
    }

    public function getType(): EnumInterface
    {
        return $this->getCachedEntity('type', fn () => Enum::make($this->data['type']));
    }

    /** @return int|float */
    public function getValue()
    {
        return $this->data['value'];
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
