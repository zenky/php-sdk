<?php

declare(strict_types=1);

namespace Zenky\Stores\Interfaces;

interface CitiesSettingsInterface
{
    public function getDefaultCityId(): ?string;
}
