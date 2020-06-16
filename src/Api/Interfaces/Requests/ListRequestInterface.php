<?php

declare(strict_types=1);

namespace Zenky\Api\Interfaces\Requests;

interface ListRequestInterface extends ApiRequestInterface
{
    public function getCount(): ?int;

    public function setCount(int $count): ListRequestInterface;

    public function getPage(): ?int;

    public function setPage(int $page): ListRequestInterface;

    public function getSearch(): ?string;

    public function setSearch(string $search): ListRequestInterface;

    public function getIncludes(): ?array;

    public function setIncludes(array $includes): ListRequestInterface;
}
