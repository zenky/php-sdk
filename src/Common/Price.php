<?php

declare(strict_types=1);

namespace Zenky\Common;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\Common\Interfaces\CurrencyInterface;
use Zenky\Common\Interfaces\PriceInterface;

class Price extends AbstractEntity implements PriceInterface
{
    public function getValue(): int
    {
        return $this->data['value'];
    }

    public function getShort(): string
    {
        return $this->data['short'];
    }

    public function getFull(): string
    {
        return $this->data['full'];
    }

    public function getTrimmed(): string
    {
        return $this->data['trimmed'];
    }

    public function getCurrency(): CurrencyInterface
    {
        return new Currency($this->data['currency']);
    }
}
