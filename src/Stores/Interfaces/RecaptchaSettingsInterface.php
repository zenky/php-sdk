<?php

declare(strict_types=1);

namespace Zenky\Stores\Interfaces;

use Zenky\Common\Interfaces\EnumInterface;

interface RecaptchaSettingsInterface
{
    public function isEnabled(): bool;

    /** @return array|EnumInterface[] */
    public function getActions(): array;

    public function getKey(): ?string;
}
