<?php

declare(strict_types=1);

namespace Zenky\SyncGates\Responses;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\SyncGates\Interfaces\Responses\SyncGateResponseInterface;

class SyncGateResponse extends AbstractEntity implements SyncGateResponseInterface
{
    public function getId(): string
    {
        return $this->data['sync_identifier'];
    }

    public function wasQueued(): bool
    {
        if (!isset($this->data['queued'])) {
            return false;
        }

        return $this->data['queued'] === true;
    }

    public function getCount(): int
    {
        return intval($this->data['count'] ?? 0);
    }

    public function getCreatedCount(): int
    {
        return intval($this->data['created_count'] ?? 0);
    }

    public function getExistedCount(): int
    {
        return intval($this->data['existed_count'] ?? 0);
    }

    public function getUpdatedCount(): int
    {
        return intval($this->data['updated_count'] ?? 0);
    }

    public function getDeletedCount(): int
    {
        return intval($this->data['deleted_count'] ?? 0);
    }
}
