<?php

declare(strict_types=1);

namespace Zenky\Contacts\Interfaces;

use Zenky\Common\Interfaces\EnumInterface;

interface ContactInterface
{
    public function getId(): string;

    public function getType(): EnumInterface;

    public function getValue();
}
