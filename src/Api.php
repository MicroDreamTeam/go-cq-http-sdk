<?php

namespace Itwmw\GoCqHttp;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use InvalidArgumentException;
use Itwmw\GoCqHttp\Apis\Bot;
use Itwmw\GoCqHttp\Apis\Cq;
use Itwmw\GoCqHttp\Apis\Friend;
use Itwmw\GoCqHttp\Apis\GroupAction;
use Itwmw\GoCqHttp\Apis\GroupFile;
use Itwmw\GoCqHttp\Apis\GroupInfo;
use Itwmw\GoCqHttp\Apis\GroupSetting;
use Itwmw\GoCqHttp\Apis\Image;
use Itwmw\GoCqHttp\Apis\Message;
use Itwmw\GoCqHttp\Apis\Record;
use Itwmw\GoCqHttp\Apis\Request;
use Itwmw\GoCqHttp\Middlewares\ResponseMiddleware;
use Itwmw\GoCqHttp\Support\Utils;

/**
 * @property-read Bot          $bot          Bot 账号的相关 API
 * @property-read Friend       $friend       好友的相关 API
 * @property-read Message      $message      消息的相关 API
 * @property-read Image        $image        图片的相关 API
 * @property-read Record       $record       语音的相关 API
 * @property-read Request      $request      上报处理相关 API
 * @property-read GroupInfo    $groupInfo    群信息相关 API
 * @property-read GroupSetting $groupSetting 群设置相关 API
 * @property-read GroupAction  $groupAction  群操作相关 API
 * @property-read GroupFile    $groupFile    群文件相关 API
 * @property-read Cq           $cq           Go-CqHttp 相关 Api
 */
class Api
{
    protected Client $client;

    private array $apis = [];

    private Server $server;

    public function __construct(string $base_uri = 'http://127.0.0.1:5700')
    {
        $handler = new CurlHandler();
        $stack   = HandlerStack::create($handler);
        $stack->push(Utils::getMiddleware(ResponseMiddleware::class));

        $this->client = new Client([
            'base_uri'    => $base_uri,
            'timeout'     => 5.0,
            'http_errors' => false,
            'handler'     => $stack
        ]);

        $this->server = new Server();
    }

    public function getServer(): Server
    {
        return $this->server;
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
        throw new InvalidArgumentException('属性不存在');
    }
}
