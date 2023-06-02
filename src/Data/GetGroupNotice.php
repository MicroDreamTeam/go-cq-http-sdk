<?php

namespace Itwmw\GoCqHttp\Data;

class GetGroupNotice extends CreateData
{
    /**
     * @param string $notice_id    公告ID
     * @param int    $sender_id    公告发表者QQ
     * @param int    $publish_time 公告发表时间
     * @param array{
     *     text: string,
     *     images: array<int, array{
     *          id: string,
     *          height: string,
     *          width: string,
     *      }>
     * } $message 公告内容
     */
    public function __construct(
        public string $notice_id,
        public int $sender_id,
        public int $publish_time,
        public array $message,
        ...$args
    ) {
    }
}
