<?php

namespace Itwmw\GoCqHttp\CqCode;

/**
 * 文本转语音
 *
 * 通过TX的TTS接口, 采用的音源与登录账号的性别有关
 */
class Tts extends BaseCqCode
{
    public static string $_type = 'tts';

    protected array $sendFields = [
        'text'
    ];

    /**
     * @param string $text 内容 <span style="color:green">发</span>
     */
    public function __construct(
        public string $text,
        ...$args
    ) {
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
