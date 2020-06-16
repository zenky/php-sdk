<?php

declare(strict_types=1);

namespace Zenky\VariantOptions\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\VariantOptions\Interfaces\VariantOptionInterface;

interface PaginatedVariantOptionsResponseInterface extends PaginatedResponseInterface
{
    /** @return array|VariantOptionInterface[] */
    public function getItems(): array;
}
