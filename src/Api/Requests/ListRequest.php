<?php

declare(strict_types=1);

namespace Zenky\Api\Requests;

use Zenky\Api\Interfaces\Requests\ListRequestInterface;

class ListRequest extends ApiRequest implements ListRequestInterface
{
    public function getCount(): ?int
    {
        return $this->getQuery('count');
    }

    public function setCount(int $count): ListRequestInterface
    {
        return $this->addQuery('count', $count);
    }

    public function getPage(): ?int
    {
        return $this->getQuery('page');
    }

    public function setPage(int $page): ListRequestInterface
    {
        return $this->addQuery('page', $page);
    }

    public function getSearch(): ?string
    {
        return $this->getQuery('search');
    }

    public function setSearch(string $search): ListRequestInterface
    {
        return $this->addQuery('search', $search);
    }

    public function getIncludes(): ?array
    {
        return $this->getQuery('includes');
    }

    public function setIncludes(array $includes): ListRequestInterface
    {
        return $this->addQuery('includes', $includes);
    }
}
