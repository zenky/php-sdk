<?php

declare(strict_types=1);

namespace Zenky\Api\Responses;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\Api\Interfaces\Responses\PaginationInterface;

class PaginatedResponse extends AbstractEntity implements PaginatedResponseInterface
{
    public function getItems(): array
    {
        return $this->data['items'];
    }

    public function getPagination(): PaginationInterface
    {
        return $this->getCachedEntity(
            'pagination',
            fn () => new Pagination($this->data['meta']['pagination'])
        );
    }
}
