<?php

declare(strict_types=1);

namespace Zenky\Common;

use Zenky\Common\Interfaces\EnumInterface;

class Enum implements EnumInterface
{
    private string $id;
    private string $name;

    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function make(array $data): EnumInterface
    {
        return new static($data['id'], $data['name']);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
