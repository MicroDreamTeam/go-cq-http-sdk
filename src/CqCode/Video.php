<?php

namespace Itwmw\GoCqHttp\CqCode;

/**
 * 短视频
 */
class Video extends BaseCqCode
{
    public static string $_type = 'video';

    protected array $sendFields = [
        'file',
        'cover',
        'c'
    ];

    /**
     * @param string $file  视频地址, 支持http和file发送 <span style="color:green">收 + 发</span>
     * @param string $cover 视频封面, 支持http, file和base64发送, 格式必须为jpg <span style="color:green">发</span>
     * @param int    $c     通过网络下载视频时的线程数, 默认单线程. (在资源不支持并发时会自动处理) <span style="color:green">发</span>
     * @param string $url   视频Url <span style="color:green">收 </span>
     */
    public function __construct(
        public string $file,
        public string $cover = '',
        public int $c = 1,
        public string $url = '',
        ...$args
    ) {
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
