<?php

namespace Itwmw\GoCqHttp\CqCode;

use Itwmw\GoCqHttp\Apis\Message;

/**
 * 合并转发
 */
class Forward extends BaseCqCode
{
    public static string $_type = 'forward';

    protected array $sendFields = [];

    /**
     * @param string $id 合并转发ID, 需要通过 {@see Message::getForwardMsg() get_forward_msg} API获取转发的具体内容 <span style="color:green">收</span>
     */
    public function __construct(
        public string $id,
        ...$args
    ) {
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
