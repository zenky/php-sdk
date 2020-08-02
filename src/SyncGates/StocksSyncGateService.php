<?php

declare(strict_types=1);

namespace Zenky\SyncGates;

class StocksSyncGateService extends AbstractSyncGateService
{
    protected function getBaseUrl(string $token): string
    {
        return 'stocks';
    }
}
