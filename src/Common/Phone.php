<?php

declare(strict_types=1);

namespace Zenky\Common;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\Common\Interfaces\PhoneInterface;

class Phone extends AbstractEntity implements PhoneInterface
{
    public function getE164(): string
    {
        return $this->data['e164'];
    }

    public function getInternational(): string
    {
        return $this->data['international'];
    }

    public function getNational(): string
    {
        return $this->data['national'];
    }
}
