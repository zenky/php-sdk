<?php

declare(strict_types=1);

namespace Zenky\Schedule;

use Zenky\Schedule\Interfaces\NextWorkingDayInterface;
use Zenky\Schedule\Interfaces\TodayScheduleInterface;

class TodaySchedule extends DaySchedule implements TodayScheduleInterface
{
    public function isOpen(): bool
    {
        return $this->data['open'] === true;
    }

    public function getNextWorkingDay(): NextWorkingDayInterface
    {
        return $this->getCachedEntity('next_working_day', fn () => new NextWorkingDay($this->data['next_open_at']));
    }
}
