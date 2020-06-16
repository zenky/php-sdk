<?php

declare(strict_types=1);

namespace Zenky\Api\Interfaces\Responses;

interface PaginationInterface
{
    public function getTotalCount(): int;

    public function getCount(): int;

    public function getTotalPages(): int;

    public function getPerPage(): int;

    public function getPreviousPageUrl(): ?string;

    public function getNextPageUrl(): string;
}
