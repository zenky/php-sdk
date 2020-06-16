<?php

declare(strict_types=1);

namespace Zenky\Common;

use Zenky\Common\Interfaces\PercentageInterface;

class Percentage implements PercentageInterface
{
    private float $value;
    private int $percentage;

    public function __construct(float $value, int $percentage)
    {
        $this->value = $value;
        $this->percentage = $percentage;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getPercentage(): int
    {
        return $this->percentage;
    }
}
