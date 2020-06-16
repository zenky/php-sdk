<?php

declare(strict_types=1);

namespace Zenky\Features\Interfaces;

use Zenky\Common\Interfaces\EnumInterface;
use Zenky\ExternalIdentifiers\Interfaces\HasExternalIdentifier;

interface FeatureInterface extends HasExternalIdentifier
{
    public function getId(): string;

    public function getName(): ?string;

    public function isFilterable(): bool;

    public function getFieldType(): EnumInterface;

    public function getRangeType(): ?EnumInterface;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;

    /** @return array|FeatureValueInterface[] */
    public function getValues(): array;
}
