<?php

declare(strict_types=1);

namespace Zenky\Stores;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\Stores\Interfaces\CitiesSettingsInterface;
use Zenky\Stores\Interfaces\CurrencySettingsInterface;
use Zenky\Stores\Interfaces\LoyaltySettingsInterface;
use Zenky\Stores\Interfaces\OrdersSettingsInterface;
use Zenky\Stores\Interfaces\PriceTypesSettingsInterface;
use Zenky\Stores\Interfaces\RecaptchaSettingsInterface;
use Zenky\Stores\Interfaces\StoreSettingsInterface;

class StoreSettings extends AbstractEntity implements StoreSettingsInterface
{
    public function getOrderSettings(): OrdersSettingsInterface
    {
        return $this->getAttributeEntity('orders', fn (array $data) => new OrdersSettings($data));
    }

    public function getCitiesSettings(): CitiesSettingsInterface
    {
        return $this->getAttributeEntity('city', fn (array $data) => new CitiesSettings($data));
    }

    public function getCurrencySettings(): CurrencySettingsInterface
    {
        return $this->getAttributeEntity('currency', fn (array $data) => new CurrencySettings($data));
    }

    public function getLoyaltySettings(): LoyaltySettingsInterface
    {
        return $this->getAttributeEntity('loyalty', fn (array $data) => new LoyaltySettings($data));
    }

    public function getPriceTypesSettings(): PriceTypesSettingsInterface
    {
        return $this->getAttributeEntity('price_type', fn (array $data) => new PriceTypesSettings($data));
    }

    public function getRecaptchaSettings(): RecaptchaSettingsInterface
    {
        return $this->getAttributeEntity('recaptcha', fn (array $data) => new RecaptchaSettings($data));
    }
}
