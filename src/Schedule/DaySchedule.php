<?php

declare(strict_types=1);

namespace Zenky\Schedule;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\Schedule\Interfaces\DayScheduleInterface;

class DaySchedule extends AbstractEntity implements DayScheduleInterface
{
    public function getDay(): string
    {
        return $this->data['day'];
    }

    public function getName(): string
    {
        return $this->data['name'];
    }

    public function getHours(): array
    {
        return $this->data['hours'];
    }
}
