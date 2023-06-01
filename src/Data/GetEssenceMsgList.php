<?php

namespace Itwmw\GoCqHttp\Data;

class GetEssenceMsgList extends CreateData
{
    /**
     * @param int    $sender_id     发送者QQ 号
     * @param string $sender_nick   发送者昵称
     * @param int    $sender_time   消息发送时间
     * @param int    $operator_id   操作者QQ 号
     * @param string $operator_nick 操作者昵称
     * @param int    $operator_time 精华设置时间
     * @param int    $message_id    消息ID
     */
    public function __construct(
        public readonly int $sender_id,
        public readonly string $sender_nick,
        public readonly int $sender_time,
        public readonly int $operator_id,
        public readonly string $operator_nick,
        public readonly int $operator_time,
        public readonly int $message_id,
    ) {
    }
}
