<?php

declare(strict_types=1);

namespace Zenky\Common\Interfaces;

interface PercentageInterface
{
    public function getValue(): float;

    public function getPercentage(): int;
}
