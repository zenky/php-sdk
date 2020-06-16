<?php

declare(strict_types=1);

namespace Zenky\Stores;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\Stores\Interfaces\PriceTypesSettingsInterface;

class PriceTypesSettings extends AbstractEntity implements PriceTypesSettingsInterface
{
    public function getDefaultPriceTypeId(): ?string
    {
        return $this->data['default'];
    }
}
