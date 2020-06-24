<?php

declare(strict_types=1);

namespace Zenky\Api\Interfaces\Requests;

interface ApiRequestInterface
{
    public function getMethod(): ?string;

    public function setMethod(string $method): ApiRequestInterface;

    public function getUrl(): ?string;

    public function setUrl(string $url): ApiRequestInterface;

    public function getQuery(?string $key = null);

    public function setQuery(array $query): ApiRequestInterface;

    public function addQuery(string $key, $value): ApiRequestInterface;

    public function getHeaders(): array;

    public function setHeaders(array $headers): ApiRequestInterface;

    public function addHeader(string $name, $value): ApiRequestInterface;

    public function getTimezone(): ?string;

    public function setTimezone(string $timezone): ApiRequestInterface;

    public function getLocale(): ?string;

    public function setLocale(string $locale): ApiRequestInterface;
}
