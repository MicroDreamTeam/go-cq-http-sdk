<?php

namespace Itwmw\GoCqHttp\CqCode;

/**
 * 音乐自定义分享
 */
class MusicCustom extends BaseCqCode
{
    public static string $_type = 'music';

    protected array $sendFields = [
        'type',
        'url',
        'audio',
        'title',
        'content',
        'image',
    ];

    /**
     * @param string $url     点击后跳转目标 URL <span style="color:green">收 + 发</span>
     * @param string $audio   音乐 URL <span style="color:green">收 + 发</span>
     * @param string $title   标题 <span style="color:green">收 + 发</span>
     * @param string $content 发送时可选, 内容描述 <span style="color:green">收 + 发</span>
     * @param string $image   发送时可选, 图片 URL <span style="color:green">收 + 发</span>
     * @param string $type   表示音乐自定义分享
     */
    public function __construct(
        public string $url,
        public string $audio,
        public string $title,
        public string $content = '',
        public string $image = '',
        public string $type = 'custom',
        ...$args
    ) {
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
