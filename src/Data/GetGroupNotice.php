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
        public readonly string $notice_id,
        public readonly int $sender_id,
        public readonly int $publish_time,
        public readonly array $message,
    ) {
    }
}
