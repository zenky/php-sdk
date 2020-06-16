<?php

declare(strict_types=1);

namespace Zenky\CardTokens\Interfaces;

interface BankLogosInterface
{
    public function getSvgLogoUrl(): ?string;

    public function getPngLogoUrl(): ?string;
}
