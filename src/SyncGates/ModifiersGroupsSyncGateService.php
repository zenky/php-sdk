<?php

declare(strict_types=1);

namespace Zenky\SyncGates;

class ModifiersGroupsSyncGateService extends AbstractSyncGateService
{
    protected function getBaseUrl(string $token): string
    {
        return 'modifiers-groups';
    }
}
