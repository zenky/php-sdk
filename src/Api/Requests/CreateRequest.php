<?php

declare(strict_types=1);

namespace Zenky\Api\Requests;

use Zenky\Api\Interfaces\Requests\CreateRequestInterface;

class CreateRequest extends ApiRequest implements CreateRequestInterface
{
    private array $payload;

    public function __construct(array $payload)
    {
        $this->payload = $payload;
    }

    public function getPayload(): array
    {
        return $this->payload;
    }
}
