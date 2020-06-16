<?php

declare(strict_types=1);

namespace Zenky\Contacts;

use Zenky\Common\Interfaces\PhoneInterface;
use Zenky\Common\Phone;
use Zenky\Contacts\Interfaces\PhoneContactInterface;

class PhoneContact extends Contact implements PhoneContactInterface
{
    public function getValue(): PhoneInterface
    {
        return $this->getCachedEntity('phone', fn () => new Phone($this->data['value']));
    }
}
