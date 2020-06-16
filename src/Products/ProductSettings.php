<?php

declare(strict_types=1);

namespace Zenky\Products;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\Products\Interfaces\ProductSettingsInterface;

class ProductSettings extends AbstractEntity implements ProductSettingsInterface
{
    public function cashbackEnabled(): bool
    {
        return $this->data['cashback']['enabled'] === true;
    }

    public function getCashbackPercentage(): ?int
    {
        return $this->data['cashback']['percentage'];
    }

    public function discountsEnabled(): bool
    {
        return $this->data['discounts']['enabled'] === true;
    }
}
