<?php

declare(strict_types=1);

namespace Zenky\Users\Interfaces;

use Zenky\Common\Interfaces\EnumInterface;

interface StoreUserInterface extends UserInterface
{
    public function getStoreRole(): EnumInterface;
}
