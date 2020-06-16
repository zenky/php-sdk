<?php

declare(strict_types=1);

namespace Zenky\Common;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\Common\Interfaces\WeightInterface;

class Weight extends AbstractEntity implements WeightInterface
{
    public function getGrams(): int
    {
        return $this->data['grams'];
    }

    public function getFull(): string
    {
        return $this->data['full'];
    }

    public function getShort(): string
    {
        return $this->data['short'];
    }
}
