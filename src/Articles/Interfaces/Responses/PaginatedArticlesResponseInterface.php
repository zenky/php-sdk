<?php

declare(strict_types=1);

namespace Zenky\Articles\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\Articles\Interfaces\ArticleInterface;

interface PaginatedArticlesResponseInterface extends PaginatedResponseInterface
{
    /** @return array|ArticleInterface[] */
    public function getItems(): array;
}
