<?php

declare(strict_types=1);

namespace Zenky\Common\Interfaces;

interface CurrencyInterface
{
    public function getName(): string;

    public function getThousandsSeparator(): string;

    public function getDecimalsSeparator(): string;

    public function getPrefix(): ?string;

    public function getSuffix(): ?string;

    public function getSymbol(): ?string;
}
