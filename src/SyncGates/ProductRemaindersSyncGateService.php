<?php

declare(strict_types=1);

namespace Zenky\SyncGates;

class ProductRemaindersSyncGateService extends AbstractSyncGateService
{
    protected function getBaseUrl(string $token): string
    {
        return 'products/remainders';
    }
}
