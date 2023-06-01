<?php

namespace Itwmw\GoCqHttp;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use Itwmw\GoCqHttp\Apis\Bot;
use Itwmw\GoCqHttp\Apis\Friend;
use Itwmw\GoCqHttp\Apis\Image;
use Itwmw\GoCqHttp\Apis\Message;
use Itwmw\GoCqHttp\Apis\Record;
use Itwmw\GoCqHttp\Apis\Request;
use Itwmw\GoCqHttp\Middlewares\ResponseMiddleware;

/**
 * @property-read Bot     $bot     Bot 账号的相关 API
 * @property-read Friend  $friend  好友的相关 API
 * @property-read Message $message 消息的相关 API
 * @property-read Image   $image   图片的相关 API
 * @property-read Record  $record  语音的相关 API
 * @property-read Request $request 上报处理相关 API
 */
class Api
{
    protected Client $client;

    private array $apis = [];

    public function __construct(string $base_uri = 'http://127.0.0.1:5700')
    {
        $handler = new CurlHandler();
        $stack   = HandlerStack::create($handler);
        $stack->push($this->getMiddleware(ResponseMiddleware::class));

        $this->client = new Client([
            'base_uri'    => $base_uri,
            'timeout'     => 5.0,
            'http_errors' => false,
            'handler'     => $stack
        ]);
    }

    protected function getMiddleware(string $class, ...$params)
    {
        if (class_exists($class) && method_exists($class, '__invoke')) {
            $handler = function (...$args) use ($class) {
                return (new $class())(...$args);
            };
            return $handler(...$params);
        }

        throw new \InvalidArgumentException('中间件配置错误');
    }

    public function __get(string $name)
    {
        if (isset($this->apis[$name])) {
            return $this->apis[$name];
        }

        $apiName = '\\Itwmw\\GoCqHttp\\Apis\\' . $name;
        if (class_exists($apiName)) {
            $this->apis[$name] = new $apiName($this->client);
            return $this->apis[$name];
        }
        throw new \InvalidArgumentException('属性不存在');
    }
}
