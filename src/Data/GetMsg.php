<?php

namespace Itwmw\GoCqHttp\Data;

class GetMsg extends CreateData
{
    /**
     * 发送者
     *
     * @var array{
     *     nickname: string,
     *     user_id: int
     * }
     */
    public array $sender;

    /**
     * @param bool     $group        是否是群消息
     * @param int      $message_id   消息 ID
     * @param int      $real_id      消息真实 ID
     * @param string   $message_type 消息类型，群消息时为group, 私聊消息为private
     * @param array    $sender       发送者
     * @param int      $time         发送时间
     * @param string   $message      消息内容
     * @param string   $raw_message  原始消息内容
     * @param int|null $group_id     是群消息时的群号(否则不存在此字段)
     */
    public function __construct(
        public bool $group,
        public int $message_id,
        public int $real_id,
        public string $message_type,
        array $sender,
        public int $time,
        public string $message,
        public string $raw_message,
        public ?int $group_id = null,
        ...$args
    ) {
        $this->sender = $sender;
    }
}
