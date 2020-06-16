<?php

declare(strict_types=1);

namespace Zenky\Addresses\Interfaces;

interface HasAddresses
{
    /** @return array|AddressInterface[] */
    public function getAddresses(): array;
}
