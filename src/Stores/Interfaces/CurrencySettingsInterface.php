<?php

declare(strict_types=1);

namespace Zenky\Stores\Interfaces;

use Zenky\Common\Interfaces\CurrencyInterface;

interface CurrencySettingsInterface
{
    public function getCurrencyCode(): string;

    public function getCurrency(): CurrencyInterface;
}
