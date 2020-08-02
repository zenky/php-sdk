<?php

declare(strict_types=1);

namespace Zenky\SyncGates;

class VariantOptionsSyncGateService extends AbstractSyncGateService
{
    protected function getBaseUrl(string $token): string
    {
        return 'variant-options';
    }
}
