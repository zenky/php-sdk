<?php

declare(strict_types=1);

namespace Zenky\Features\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\Features\Interfaces\FeatureInterface;

interface PaginatedFeaturesResponseInterface extends PaginatedResponseInterface
{
    /** @return array|FeatureInterface[] */
    public function getItems(): array;
}
