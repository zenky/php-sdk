<?php

declare(strict_types=1);

namespace Zenky\ProductsCollections\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\ProductsCollections\Interfaces\ProductsCollectionInterface;

interface PaginatedProductsCollectionsResponseInterface extends PaginatedResponseInterface
{
    /** @return array|ProductsCollectionInterface[] */
    public function getItems(): array;
}
