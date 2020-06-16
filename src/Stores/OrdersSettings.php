<?php

declare(strict_types=1);

namespace Zenky\Stores;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\Common\Enum;
use Zenky\Common\Interfaces\EnumInterface;
use Zenky\Stores\Interfaces\OrdersSettingsInterface;

class OrdersSettings extends AbstractEntity implements OrdersSettingsInterface
{
    public function isConfirmationRequired(): bool
    {
        return $this->data['confirmation_required'] === true;
    }

    public function getAuthenticationMethod(): EnumInterface
    {
        return $this->getAttributeEntity('authentication_method', fn (array $data) => Enum::make($data));
    }

    public function getPaymentMethods(): array
    {
        return $this->getAttributeCollection('payment_methods', fn (array $data) => Enum::make($data));
    }
}
