<?php

declare(strict_types=1);

namespace Zenky\Schedule\Interfaces;

interface DayScheduleInterface
{
    public function getDay(): string;

    public function getName(): string;

    /** @return array|string[] */
    public function getHours(): array;
}
