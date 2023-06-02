<?php

namespace Itwmw\GoCqHttp\Data\Struct;

use Itwmw\GoCqHttp\Data\CreateData;

class InvitedRequest extends CreateData
{
    /**
     * @param int    $request_id   请求ID
     * @param int    $invitor_uin  邀请者
     * @param string $invitor_nick 邀请者昵称
     * @param int    $group_id     群号
     * @param string $group_name   群名
     * @param bool   $checked      是否已被处理
     * @param int    $actor        未处理为0
     */
    public function __construct(
        public int $request_id,
        public int $invitor_uin,
        public string $invitor_nick,
        public int $group_id,
        public string $group_name,
        public bool $checked,
        public int $actor,
        ...$args
    ) {
    }
}
