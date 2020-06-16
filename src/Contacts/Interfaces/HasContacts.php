<?php

declare(strict_types=1);

namespace Zenky\Contacts\Interfaces;

interface HasContacts
{
    /** @return array|ContactInterface[] */
    public function getContacts(): array;
}
