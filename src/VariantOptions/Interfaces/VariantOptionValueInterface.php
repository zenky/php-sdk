<?php

declare(strict_types=1);

namespace Zenky\VariantOptions\Interfaces;

use Zenky\ExternalIdentifiers\Interfaces\HasExternalIdentifier;

interface VariantOptionValueInterface extends HasExternalIdentifier
{
    public function getId(): string;

    public function getName(): ?string;

    public function getOption(): ?VariantOptionInterface;
}
