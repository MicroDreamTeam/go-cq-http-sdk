<?php

namespace Itwmw\GoCqHttp\CqCode;

/**
 * 红包，仅群聊,接收的时候不是 CQ 码
 *
 * 仅支持免费礼物, 发送群礼物消息 无法撤回, 返回的 message id 恒定为 0
 */
class Gift extends BaseCqCode
{
    public static string $_type = 'gift';

    protected array $sendFields = [
        'qq',
        'id'
    ];

    /**
     * @param int $qq 接收礼物的成员 <span style="color:green">发</span>
     * @param int<0, 13> $id 礼物的类型 <span style="color:green">发</span>
     */
    public function __construct(
        public int $qq,
        public int $id,
        ...$args
    ) {
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
