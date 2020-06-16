<?php

declare(strict_types=1);

namespace Zenky\Stores;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\Common\Currency;
use Zenky\Common\Interfaces\CurrencyInterface;
use Zenky\Stores\Interfaces\CurrencySettingsInterface;

class CurrencySettings extends AbstractEntity implements CurrencySettingsInterface
{
    public function getCurrencyCode(): string
    {
        return $this->data['code'];
    }

    public function getCurrency(): CurrencyInterface
    {
        return $this->getCachedEntity('currency', fn () => new Currency($this->data['data']));
    }
}
