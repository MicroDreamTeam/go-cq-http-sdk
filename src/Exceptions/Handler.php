<?php

namespace Itwmw\GoCqHttp\Exceptions;

use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;

/**
 * 全局捕获异常
 */
class Handler
{
    public function __construct()
    {
        set_exception_handler([$this, 'render']);
    }

    public function render(\Throwable $e)
    {
        // 连接机器人失败
        if ($e instanceof ConnectException) {
        } elseif ($e instanceof GuzzleException) {
        }
    }
}
