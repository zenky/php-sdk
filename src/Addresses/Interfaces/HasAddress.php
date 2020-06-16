<?php

declare(strict_types=1);

namespace Zenky\Addresses\Interfaces;

interface HasAddress
{
    public function getAddress(): ?AddressInterface;
}
