<?php

declare(strict_types=1);

namespace Zenky\Api\Requests;

use Zenky\Api\Interfaces\Requests\ApiRequestInterface;

class ApiRequest implements ApiRequestInterface
{
    private ?string $method = null;
    private ?string $url = null;
    private ?string $timezone = null;
    private array $query = [];

    public function getMethod(): ?string
    {
        return $this->method;
    }

    public function setMethod(string $method): ApiRequestInterface
    {
        $this->method = $method;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): ApiRequestInterface
    {
        $this->url = $url;

        return $this;
    }

    public function getQuery(?string $key = null)
    {
        if (is_null($key)) {
            return $this->query;
        }

        return $this->query[$key] ?? null;
    }

    public function setQuery(array $query): ApiRequestInterface
    {
        $this->query = $query;

        return $this;
    }

    public function addQuery(string $name, $value): ApiRequestInterface
    {
        $this->query[$name] = $value;

        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): ApiRequestInterface
    {
        $this->timezone = $timezone;

        return $this;
    }
}
