<?php

declare(strict_types=1);

namespace Zenky\Cities\Traits;

use Zenky\Cities\City;

trait IncludesCities
{
    public function getCities(): array
    {
        return $this->getAttributeCollection('cities', fn (array $data) => new City($data));
    }
}
