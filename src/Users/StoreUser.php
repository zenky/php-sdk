<?php

declare(strict_types=1);

namespace Zenky\Users;

use Zenky\Common\Enum;
use Zenky\Common\Interfaces\EnumInterface;
use Zenky\Users\Interfaces\StoreUserInterface;

class StoreUser extends User implements StoreUserInterface
{
    public function getStoreRole(): EnumInterface
    {
        return $this->getCachedEntity('store_role', fn () => Enum::make($this->data['store_role']));
    }
}
