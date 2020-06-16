<?php

declare(strict_types=1);

namespace Zenky\Api\Interfaces\Requests;

interface DeleteRequestInterface extends ApiRequestInterface
{
    public function getId(): string;
}
