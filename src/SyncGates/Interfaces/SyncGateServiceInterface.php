<?php

declare(strict_types=1);

namespace Zenky\SyncGates\Interfaces;

use Zenky\SyncGates\Interfaces\Responses\SyncGateResponseInterface;

interface SyncGateServiceInterface
{
    public function synchronize(string $token, array $payload): SyncGateResponseInterface;
}
