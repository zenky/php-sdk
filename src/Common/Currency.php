<?php

declare(strict_types=1);

namespace Zenky\Common;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\Common\Interfaces\CurrencyInterface;

class Currency extends AbstractEntity implements CurrencyInterface
{
    public function getName(): string
    {
        return $this->data['name'];
    }

    public function getThousandsSeparator(): string
    {
        return $this->data['thousands_separator'];
    }

    public function getDecimalsSeparator(): string
    {
        return $this->data['decimals_separator'];
    }

    public function getPrefix(): ?string
    {
        return $this->data['prefix'];
    }

    public function getSuffix(): ?string
    {
        return $this->data['suffix'];
    }

    public function getSymbol(): ?string
    {
        return $this->data['symbol'];
    }
}
