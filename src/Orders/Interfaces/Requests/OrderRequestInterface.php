<?php

declare(strict_types=1);

namespace Zenky\Orders\Interfaces\Requests;

use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Orders\Interfaces\OrderInterface;

interface OrderRequestInterface extends UpdateRequestInterface
{
    public function getOrder(): OrderInterface;
}
