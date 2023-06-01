<?php

namespace Itwmw\GoCqHttp\Support;

use GuzzleHttp\Psr7\Response;

class ApiResponse extends Response
{
    public function __construct(
        int $status = 200,
        array $headers = [],
        $body = null,
        string $version = '1.1',
        string $reason = null,
        protected mixed $data = null
    ) {
        parent::__construct($status, $headers, $body, $version, $reason);
    }

    public function getData(): mixed
    {
        return $this->data;
    }
}
