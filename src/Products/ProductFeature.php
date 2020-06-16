<?php

declare(strict_types=1);

namespace Zenky\Products;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\Features\Feature;
use Zenky\Features\FeatureValue;
use Zenky\Features\Interfaces\FeatureInterface;
use Zenky\Features\Interfaces\FeatureValueInterface;
use Zenky\Products\Interfaces\ProductFeatureInterface;

class ProductFeature extends AbstractEntity implements ProductFeatureInterface
{
    public function getFeature(): FeatureInterface
    {
        return $this->getCachedEntity('feature', fn () => new Feature($this->data['feature']));
    }

    public function getValue(): FeatureValueInterface
    {
        return $this->getCachedEntity('value', fn () => new FeatureValue($this->data['value']));
    }
}
