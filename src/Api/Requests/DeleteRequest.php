<?php

declare(strict_types=1);

namespace Zenky\Api\Requests;

use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;

class DeleteRequest extends ApiRequest implements DeleteRequestInterface
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }
}
