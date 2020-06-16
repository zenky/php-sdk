<?php

declare(strict_types=1);

namespace Zenky\Products\Interfaces;

interface ProductSettingsInterface
{
    public function cashbackEnabled(): bool;

    public function getCashbackPercentage(): ?int;

    public function discountsEnabled(): bool;
}
