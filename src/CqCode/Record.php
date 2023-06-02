<?php

namespace Itwmw\GoCqHttp\CqCode;

/**
 * 语音
 */
class Record extends BaseCqCode
{
    public static string $_type = 'record';

    protected array $sendFields = [
        'file',
        'magic',
        'cache',
        'proxy',
        'timeout',
    ];

    /**
     * @param string $file    语音文件名 <span style="color:green">收 + 发</span>
     * @param int    $magic   发送时可选, 默认 0, 设置为 1 表示变声 <span style="color:green">收 + 发</span>
     * @param int    $cache   只在通过网络 URL 发送时有效, 表示是否使用已缓存的文件, 默认 1 <span style="color:green">发</span>
     * @param int    $proxy   只在通过网络 URL 发送时有效, 表示是否通过代理下载文件 ( 需通过环境变量或配置文件配置代理 ) , 默认 1 <span style="color:green">发</span>
     * @param int    $timeout 只在通过网络 URL 发送时有效, 单位秒, 表示下载网络文件的超时时间 , 默认不超时 <span style="color:green">发</span>
     * @param string $url     语音 URL<span style="color:green">收</span>
     */
    public function __construct(
        public string $file,
        public int $magic = 0,
        public int $cache = 1,
        public int $proxy = 1,
        public int $timeout = 0,
        public string $url = '',
        ...$args
    ) {
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
