<?php

declare(strict_types=1);

namespace Zenky\Api\Interfaces\Responses;

interface PaginatedResponseInterface
{
    public function getItems(): array;

    public function getPagination(): PaginationInterface;
}
