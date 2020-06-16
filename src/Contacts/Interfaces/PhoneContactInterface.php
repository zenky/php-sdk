<?php

declare(strict_types=1);

namespace Zenky\Contacts\Interfaces;

use Zenky\Common\Interfaces\PhoneInterface;

interface PhoneContactInterface extends ContactInterface
{
    public function getValue(): PhoneInterface;
}
