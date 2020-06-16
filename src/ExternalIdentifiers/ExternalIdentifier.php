<?php

declare(strict_types=1);

namespace Zenky\ExternalIdentifiers;

use Zenky\ExternalIdentifiers\Interfaces\ExternalIdentifierInterface;

class ExternalIdentifier implements ExternalIdentifierInterface
{
    private $externalId;
    private string $internalId;

    public function __construct($externalId, string $internalId)
    {
        $this->externalId = $externalId;
        $this->internalId = $internalId;
    }

    public function getExternalId()
    {
        return $this->externalId;
    }

    public function getInternalId(): string
    {
        return $this->internalId;
    }
}
