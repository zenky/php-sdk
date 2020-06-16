<?php

declare(strict_types=1);

namespace Zenky\Api\Interfaces\Requests;

interface ShowRequestInterface extends ApiRequestInterface
{
    public function getId(): string;

    public function getIncludes(): ?array;

    public function setIncludes(array $includes): ShowRequestInterface;
}
