<?php

namespace Itwmw\GoCqHttp\CqCode;

/**
 * 链接分享
 */
class Share extends BaseCqCode
{
    public static string $_type = 'share';

    protected array $sendFields = [
        'url',
        'title',
        'content',
        'image',
    ];

    /**
     * @param string $url     URL <span style="color:green">收 + 发</span>
     * @param string $title   标题 <span style="color:green">收 + 发</span>
     * @param string $content 发送时可选, 内容描述 <span style="color:green">收 + 发</span>
     * @param string $image   发送时可选, 图片 URL <span style="color:green">收 + 发</span>
     */
    public function __construct(
        public string $url,
        public string $title,
        public string $content = '',
        public string $image = '',
        ...$args
    ) {
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
