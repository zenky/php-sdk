<?php

declare(strict_types=1);

namespace Zenky\ExternalIdentifiers\Interfaces;

interface ExternalIdentifierInterface
{
    public function getExternalId();

    public function getInternalId(): string;
}
