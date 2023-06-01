<?php

namespace Itwmw\GoCqHttp\Exceptions;

use Psr\Http\Message\ResponseInterface;

class ApiException extends \Exception
{
    public function __construct(string $message = '', int $code = 0, ?\Throwable $previous = null, protected ?ResponseInterface $response = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function getResponse(): ?ResponseInterface
    {
        return $this->response;
    }
}
