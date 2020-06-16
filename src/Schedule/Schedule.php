<?php

declare(strict_types=1);

namespace Zenky\Schedule;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\Schedule\Interfaces\ScheduleInterface;
use Zenky\Schedule\Interfaces\TodayScheduleInterface;

class Schedule extends AbstractEntity implements ScheduleInterface
{
    public function getTodaySchedule(): TodayScheduleInterface
    {
        return $this->getCachedEntity('today_schedule', fn () => new TodaySchedule($this->data['today']));
    }

    public function getWeekSchedule(): array
    {
        return $this->getAttributeCollection('days', fn (array $data) => new DaySchedule($data));
    }
}
