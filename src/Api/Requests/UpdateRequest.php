<?php

declare(strict_types=1);

namespace Zenky\Api\Requests;

use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;

class UpdateRequest extends ApiRequest implements UpdateRequestInterface
{
    private string $id;
    private array $payload;

    public function __construct(string $id, array $payload = [])
    {
        $this->id = $id;
        $this->payload = $payload;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getPayload(): array
    {
        return $this->payload;
    }
}
