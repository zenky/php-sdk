<?php

declare(strict_types=1);

namespace Zenky\Features\Interfaces;

use Zenky\ExternalIdentifiers\Interfaces\HasExternalIdentifier;

interface FeatureValueInterface extends HasExternalIdentifier
{
    public function getId(): string;

    public function getName(): ?string;

    /** @return int|float */
    public function getRangeValue();

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;
}
