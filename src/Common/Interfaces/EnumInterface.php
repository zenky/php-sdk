<?php

declare(strict_types=1);

namespace Zenky\Common\Interfaces;

interface EnumInterface
{
    public function getId(): string;

    public function getName(): string;
}
