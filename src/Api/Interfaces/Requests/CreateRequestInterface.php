<?php

declare(strict_types=1);

namespace Zenky\Api\Interfaces\Requests;

interface CreateRequestInterface extends ApiRequestInterface
{
    public function getPayload(): array;
}
