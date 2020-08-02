<?php

declare(strict_types=1);

namespace Zenky\SyncGates;

class CategoriesSyncGateService extends AbstractSyncGateService
{
    protected function getBaseUrl(string $token): string
    {
        return 'categories';
    }
}
