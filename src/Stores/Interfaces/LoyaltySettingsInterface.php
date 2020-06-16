<?php

declare(strict_types=1);

namespace Zenky\Stores\Interfaces;

interface LoyaltySettingsInterface
{
    public function isEnabled(): bool;
}
