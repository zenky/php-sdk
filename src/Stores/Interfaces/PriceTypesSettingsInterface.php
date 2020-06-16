<?php

declare(strict_types=1);

namespace Zenky\Stores\Interfaces;

interface PriceTypesSettingsInterface
{
    public function getDefaultPriceTypeId(): ?string;
}
