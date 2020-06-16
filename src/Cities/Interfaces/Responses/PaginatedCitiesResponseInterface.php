<?php

declare(strict_types=1);

namespace Zenky\Cities\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\Cities\Interfaces\CityInterface;

interface PaginatedCitiesResponseInterface extends PaginatedResponseInterface
{
    /** @return array|CityInterface[] */
    public function getItems(): array;
}
