<?php

declare(strict_types=1);

namespace Zenky\Common\Interfaces;

interface PriceInterface
{
    public function getValue(): int;

    public function getShort(): string;

    public function getFull(): string;

    public function getTrimmed(): string;

    public function getCurrency(): CurrencyInterface;
}
