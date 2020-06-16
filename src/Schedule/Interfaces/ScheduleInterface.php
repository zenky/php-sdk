<?php

declare(strict_types=1);

namespace Zenky\Schedule\Interfaces;

interface ScheduleInterface
{
    public function getTodaySchedule(): TodayScheduleInterface;

    /** @return array|DayScheduleInterface[] */
    public function getWeekSchedule(): array;
}
