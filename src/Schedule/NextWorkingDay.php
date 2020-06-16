<?php

declare(strict_types=1);

namespace Zenky\Schedule;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Schedule\Interfaces\NextWorkingDayInterface;

class NextWorkingDay extends AbstractApiEntity implements NextWorkingDayInterface
{
    public function getDateTime(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('datetime');
    }

    public function getDescription(): string
    {
        return $this->data['short'];
    }

    public function getDaysCount(): int
    {
        return $this->data['days'];
    }
}
