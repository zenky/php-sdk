<?php

declare(strict_types=1);

namespace Zenky\CardTokens\Interfaces;

interface BankInfoInterface
{
    public function getId(): string;

    public function getName(): string;

    public function getUrl(): string;

    /** @return array|string[] */
    public function getBackgroundColors(): array;

    public function getPrimaryBackgroundColor(): string;

    public function getBackgroundStyle(): string;

    public function getTextColor(): string;

    public function getLogoStyle(): string;

    public function getLogos(): BankLogosInterface;
}
