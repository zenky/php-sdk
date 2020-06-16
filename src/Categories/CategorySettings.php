<?php

declare(strict_types=1);

namespace Zenky\Categories;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\Categories\Interfaces\CategorySettingsInterface;

class CategorySettings extends AbstractEntity implements CategorySettingsInterface
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
