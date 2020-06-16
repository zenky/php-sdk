<?php

declare(strict_types=1);

namespace Zenky\BonusesLevels\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\BonusesLevels\Interfaces\BonusesLevelInterface;

interface PaginatedBonusesLevelsResponseInterface extends PaginatedResponseInterface
{
    /** @return array|BonusesLevelInterface[] */
    public function getItems(): array;
}
