<?php

declare(strict_types=1);

namespace Zenky\VariantOptions\Interfaces;

use Zenky\ExternalIdentifiers\Interfaces\HasExternalIdentifier;

interface VariantOptionInterface extends HasExternalIdentifier
{
    public function getId(): string;

    public function getName(): ?string;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;

    /** @return array|VariantOptionValueInterface[] */
    public function getValues(): array;
}
