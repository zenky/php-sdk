<?php

declare(strict_types=1);

namespace Zenky\Common\Interfaces;

interface WeightInterface
{
    public function getGrams(): int;

    public function getFull(): string;

    public function getShort(): string;
}
