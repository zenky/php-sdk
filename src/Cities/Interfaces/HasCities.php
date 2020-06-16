<?php

declare(strict_types=1);

namespace Zenky\Cities\Interfaces;

interface HasCities
{
    public function getCities(): array;
}
