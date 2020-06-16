<?php

declare(strict_types=1);

namespace Zenky\Products\Interfaces;

use Zenky\Features\Interfaces\FeatureInterface;
use Zenky\Features\Interfaces\FeatureValueInterface;

interface ProductFeatureInterface
{
    public function getFeature(): FeatureInterface;

    public function getValue(): FeatureValueInterface;
}
