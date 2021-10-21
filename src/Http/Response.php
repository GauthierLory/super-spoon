<?php

namespace App\Http;

class Response
{
    protected int $statusCode;
    protected string $content;
    protected array $headers;

    public function __construct(int $statusCode = 200, string $content = '', array $headers = [])
    {
        $this->statusCode = $statusCode;
        $this->content = $content;
        $this->headers = array_merge([
            'Content-Type' => "text/html; charset=utf-8",
            ]
            ,$headers
        );
    }

    public function setStatusCode(int $code)
    {
        $this->statusCode;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setContent(string $content)
    {
        $this->content;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function addHeader(string $header, string $value)
    {
        $this->headers[$header] = $value;
    }

    public function getHeader(string $header): ?string {
        return $this->headers[$header] ?? null;
    }

    public function send()
    {
        http_response_code($this->statusCode);
        echo $this->content;
        foreach ($this->headers as $header => $value) {
            header("$header: $value");
        }
    }
}
