<?php

declare(strict_types=1);

namespace Zenky\Common\Interfaces;

interface PhoneInterface
{
    public function getE164(): string;

    public function getInternational(): string;

    public function getNational(): string;
}
