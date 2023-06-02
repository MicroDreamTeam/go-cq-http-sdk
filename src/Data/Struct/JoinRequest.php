<?php

namespace Itwmw\GoCqHttp\Data\Struct;

use Itwmw\GoCqHttp\Data\CreateData;

class JoinRequest extends CreateData
{
    /**
     * @param int         $request_id      请求ID
     * @param int         $requester_uin   请求者
     * @param string      $requester_nick  请求者昵称
     * @param string      $message         验证消息
     * @param int         $group_id        群号
     * @param string      $group_name      群名
     * @param bool        $checked         是否已被处理
     * @param int         $actor           未处理为0
     * @param string|null $action_uin_nick 处理者昵称
     * @param int|null    $action_uin      处理者QQ
     * @param bool|null   $suspicious      可疑用户
     */
    public function __construct(
        public int $request_id,
        public int $requester_uin,
        public string $requester_nick,
        public string $message,
        public int $group_id,
        public string $group_name,
        public bool $checked,
        public int $actor,
        public ?string $action_uin_nick = null,
        public ?int $action_uin = null,
        public ?bool $suspicious = null,
        ...$args
    ) {
    }
}
