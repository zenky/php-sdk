<?php

declare(strict_types=1);

namespace Zenky\Stores\Interfaces;

interface StoreSettingsInterface
{
    public function getOrderSettings(): OrdersSettingsInterface;

    public function getCitiesSettings(): CitiesSettingsInterface;

    public function getCurrencySettings(): CurrencySettingsInterface;

    public function getLoyaltySettings(): LoyaltySettingsInterface;

    public function getPriceTypesSettings(): PriceTypesSettingsInterface;

    public function getRecaptchaSettings(): RecaptchaSettingsInterface;
}
