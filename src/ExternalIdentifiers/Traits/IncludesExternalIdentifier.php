<?php

declare(strict_types=1);

namespace Zenky\ExternalIdentifiers\Traits;

use Zenky\ExternalIdentifiers\ExternalIdentifier;
use Zenky\ExternalIdentifiers\Interfaces\ExternalIdentifierInterface;

trait IncludesExternalIdentifier
{
    public function getExternalIdentifier(): ?ExternalIdentifierInterface
    {
        return $this->getCachedEntity('external_identifier', function () {
            if (!$this->attributeFilled('external_identifier')) {
                return null;
            }

            return new ExternalIdentifier(
                $this->data['external_identifier']['external_id'],
                $this->data['external_identifier']['internal_id'],
            );
        });
    }
}
