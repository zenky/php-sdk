<?php

declare(strict_types=1);

namespace Zenky\Api\Requests;

use Zenky\Api\Interfaces\Requests\ShowRequestInterface;

class ShowRequest extends ApiRequest implements ShowRequestInterface
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getIncludes(): ?array
    {
        return $this->getQuery('includes');
    }

    public function setIncludes(array $includes): ShowRequestInterface
    {
        return $this->addQuery('includes', $includes);
    }
}
