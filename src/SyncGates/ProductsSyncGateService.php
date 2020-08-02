<?php

declare(strict_types=1);

namespace Zenky\SyncGates;

class ProductsSyncGateService extends AbstractSyncGateService
{
    protected function getBaseUrl(string $token): string
    {
        return 'products';
    }
}
