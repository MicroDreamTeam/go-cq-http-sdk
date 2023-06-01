<?php

namespace Itwmw\GoCqHttp\Data\Struct;

use Itwmw\GoCqHttp\Data\CreateData;

class Statistics extends CreateData
{
    /**
     * @param int $packet_received   收到的数据包总数
     * @param int $packet_sent       发送的数据包总数
     * @param int $packet_lost       数据包丢失总数
     * @param int $message_received  接受信息总数
     * @param int $message_sent      发送信息总数
     * @param int $disconnect_times  TCP 链接断开次数
     * @param int $lost_times        账号掉线次数
     * @param int $last_message_time 最后一条消息时间
     */
    public function __construct(
        public readonly int $packet_received,
        public readonly int $packet_sent,
        public readonly int $packet_lost,
        public readonly int $message_received,
        public readonly int $message_sent,
        public readonly int $disconnect_times,
        public readonly int $lost_times,
        public readonly int $last_message_time,
        ...$args
    ) {
    }
}
