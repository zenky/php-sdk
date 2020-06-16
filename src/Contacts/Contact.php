<?php

declare(strict_types=1);

namespace Zenky\Contacts;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Common\Enum;
use Zenky\Common\Interfaces\EnumInterface;
use Zenky\Contacts\Interfaces\ContactInterface;

class Contact extends AbstractApiEntity implements ContactInterface
{
    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getType(): EnumInterface
    {
        return $this->getCachedEntity('type', fn () => Enum::make($this->data['type']));
    }

    public function getValue()
    {
        return $this->data['value'];
    }
}
