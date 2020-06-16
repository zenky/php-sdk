<?php

declare(strict_types=1);

namespace Zenky\Schedule\Interfaces;

interface NextWorkingDayInterface
{
    public function getDateTime(): \DateTimeImmutable;

    public function getDescription(): string;

    public function getDaysCount(): int;
}
