<?php

namespace App\Http;

class Request
{
    public array $params;
    private string $pathInfo;

    public function __construct(string $pathInfo ="/" ,array $params = [])
    {
        $this->params = $params;
        $this->pathInfo = $pathInfo;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function getParam(string $name): ?string
    {
        return $this->params[$name] ?? null;
    }

    /**
     * @return string
     */
    public function getPathInfo(): string
    {
        return $this->pathInfo;
    }

}