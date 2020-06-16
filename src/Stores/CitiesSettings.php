<?php

declare(strict_types=1);

namespace Zenky\Stores;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\Stores\Interfaces\CitiesSettingsInterface;

class CitiesSettings extends AbstractEntity implements CitiesSettingsInterface
{
    public function getDefaultCityId(): ?string
    {
        return $this->data['default'];
    }
}
