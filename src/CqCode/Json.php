<?php

namespace Itwmw\GoCqHttp\CqCode;

/**
 * JSON 消息
 */
class Json extends BaseCqCode
{
    public static string $_type = 'json';

    protected array $sendFields = [
        'data',
        'resid'
    ];

    /**
     * @param string $data json内容, json的所有字符串记得实体化处理 <span style="color:green">收 + 发</span>
     * @param int $resid 默认不填为0, 走小程序通道, 填了走富文本通道发送 <span style="color:green">收 + 发</span>
     */
    public function __construct(
        public string $data,
        public int $resid = 0,
        ...$args
    ) {
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
