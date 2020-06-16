<?php

declare(strict_types=1);

namespace Zenky\Schedule\Interfaces;

interface TodayScheduleInterface extends DayScheduleInterface
{
    public function isOpen(): bool;

    public function getNextWorkingDay(): NextWorkingDayInterface;
}
