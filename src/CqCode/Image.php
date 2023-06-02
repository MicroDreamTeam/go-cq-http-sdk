<?php

namespace Itwmw\GoCqHttp\CqCode;

/**
 * 图片
 */
class Image extends BaseCqCode
{
    public static string $_type = 'image';

    protected array $sendFields = [
        'file',
        'type',
        'subType',
        'url',
        'cache',
        'id',
        'c'
    ];

    /**
     * @param string           $file    图片文件名 <span style="color:green">收 + 发</span>
     * @param string           $type    图片类型, flash 表示闪照, show 表示秀图, 默认普通图片 <span style="color:green">收 + 发</span>
     * @param int<0,13>        $subType 图片子类型, 只出现在群聊. <span style="color:green">收 + 发</span>
     * @param string           $url     图片 URL <span style="color:green">收</span>
     * @param int              $cache   只在通过网络 URL 发送时有效, 表示是否使用已缓存的文件, 默认 1 <span style="color:green">发</span>
     * @param int<40000,40005> $id      发送秀图时的特效id, 默认为40000 <span style="color:green">发</span>
     * @param int<1,3>         $c       通过网络下载图片时的线程数, 默认单线程. (在资源不支持并发时会自动处理) <span style="color:green">发</span>
     */
    public function __construct(
        public string $file,
        public string $type = '',
        public int $subType = 0,
        public string $url = '',
        public int $cache = 1,
        public int $id = 40000,
        public int $c = 1,
        ...$args
    ) {
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
