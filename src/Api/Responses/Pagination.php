<?php

declare(strict_types=1);

namespace Zenky\Api\Responses;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\Api\Interfaces\Responses\PaginationInterface;

class Pagination extends AbstractEntity implements PaginationInterface
{
    public function getTotalCount(): int
    {
        return $this->data['total'];
    }

    public function getCount(): int
    {
        return $this->data['count'];
    }

    public function getTotalPages(): int
    {
        return $this->data['total_pages'];
    }

    public function getPerPage(): int
    {
        return $this->data['per_page'];
    }

    public function getPreviousPageUrl(): ?string
    {
        return $this->getUrl('previous');
    }

    public function getNextPageUrl(): string
    {
        return $this->getUrl('next');
    }

    private function getUrl(string $type): ?string
    {
        if (!isset($this->data['links']) || !is_array($this->data['links'])) {
            return null;
        } elseif (empty($this->data['links'][$type])) {
            return null;
        }

        return $this->data['links'][$type];
    }
}
