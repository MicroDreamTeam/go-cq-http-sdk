<?php

namespace Itwmw\GoCqHttp\CqCode;

/**
 * 音乐分享
 */
class Music extends BaseCqCode
{
    public static string $_type = 'music';

    protected array $sendFields = [
        'type',
        'id'
    ];

    /**
     * @param string $type QQ 音乐、网易云音乐、虾米音乐 <span style="color:green">发</span>
     * @param string $id   歌曲 ID <span style="color:green">发</span>
     */
    public function __construct(
        public string $type,
        public string $id,
        ...$args
    ) {
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
