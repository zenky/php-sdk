<?php

declare(strict_types=1);

namespace Zenky\Api\Interfaces\Requests;

interface UpdateRequestInterface extends ApiRequestInterface
{
    public function getId(): string;

    public function getPayload(): array;
}
