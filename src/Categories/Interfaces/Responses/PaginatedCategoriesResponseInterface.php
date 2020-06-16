<?php

declare(strict_types=1);

namespace Zenky\Categories\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\Categories\Interfaces\CategoryInterface;

interface PaginatedCategoriesResponseInterface extends PaginatedResponseInterface
{
    /** @return array|CategoryInterface[] */
    public function getItems(): array;
}
