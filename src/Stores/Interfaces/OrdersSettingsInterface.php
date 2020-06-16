<?php

declare(strict_types=1);

namespace Zenky\Stores\Interfaces;

use Zenky\Common\Interfaces\EnumInterface;

interface OrdersSettingsInterface
{
    public function isConfirmationRequired(): bool;

    public function getAuthenticationMethod(): EnumInterface;

    /** @return array|EnumInterface[] */
    public function getPaymentMethods(): array;
}
