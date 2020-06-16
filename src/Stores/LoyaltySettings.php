<?php

declare(strict_types=1);

namespace Zenky\Stores;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\Stores\Interfaces\LoyaltySettingsInterface;

class LoyaltySettings extends AbstractEntity implements LoyaltySettingsInterface
{
    public function isEnabled(): bool
    {
        return $this->data['enabled'] === true;
    }
}
