<?php

declare(strict_types=1);

namespace Zenky\SyncGates\Interfaces\Responses;

interface SyncGateResponseInterface
{
    public function getId(): string;

    public function wasQueued(): bool;

    public function getCount(): int;

    public function getCreatedCount(): int;

    public function getExistedCount(): int;

    public function getUpdatedCount(): int;

    public function getDeletedCount(): int;
}
