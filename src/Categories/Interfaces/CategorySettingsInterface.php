<?php

declare(strict_types=1);

namespace Zenky\Categories\Interfaces;

interface CategorySettingsInterface
{
    public function cashbackEnabled(): bool;

    public function getCashbackPercentage(): ?int;

    public function discountsEnabled(): bool;
}
