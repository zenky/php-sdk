<?php

declare(strict_types=1);

namespace Zenky\ExternalIdentifiers\Interfaces;

interface HasExternalIdentifier
{
    public function getExternalIdentifier(): ?ExternalIdentifierInterface;
}
