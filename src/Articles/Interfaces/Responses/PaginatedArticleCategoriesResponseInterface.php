<?php

declare(strict_types=1);

namespace Zenky\Articles\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\Articles\Interfaces\ArticleCategoryInterface;

interface PaginatedArticleCategoriesResponseInterface extends PaginatedResponseInterface
{
    /** @return array|ArticleCategoryInterface[] */
    public function getItems(): array;
}
