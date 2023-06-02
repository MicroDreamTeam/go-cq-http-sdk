<?php

namespace Itwmw\GoCqHttp\CqCode;

/**
 * 戳一戳，仅群聊
 *
 * 发送戳一戳消息无法撤回, 返回的 message id 恒定为 0
 */
class Poke extends BaseCqCode
{
    public static string $_type = 'poke';

    protected array $sendFields = [
        'qq'
    ];

    /**
     * @param int $qq 需要戳的成员 <span style="color:green">发</span>
     */
    public function __construct(
        public int $qq,
        ...$args
    ) {
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
