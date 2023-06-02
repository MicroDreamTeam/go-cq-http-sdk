<?php

namespace Itwmw\GoCqHttp\Data\Post\Message;

use Itwmw\GoCqHttp\Exceptions\PostMessageException;

/**
 * 私聊消息
 */
class PrivateMessage extends BaseMessage
{
    /** @var int 接收者 QQ 号 */
    public int $target_id;

    /** @var int 临时会话来源 */
    public int $temp_source;

    /**
     * 快捷响应
     *
     * @param string $reply       要回复的内容
     * @param bool   $auto_escape 消息内容是否作为纯文本发送 ( 即不解析 CQ 码 ) , 只在 reply 字段是字符串时有效
     *
     * @return string
     *
     * @throws PostMessageException
     */
    public function response(string $reply, bool $auto_escape = false): string
    {
        $result = json_encode(compact('reply', 'auto_escape'));
        if (false === $result) {
            throw new PostMessageException('回复消息失败');
        }
        return $result;
    }
}
