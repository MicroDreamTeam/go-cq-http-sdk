<?php

namespace Itwmw\GoCqHttp\Data;

class GetFriendList extends CreateData
{
    /**
     * @param int    $user_id  QQ 号
     * @param string $nickname 昵称
     * @param string $remark   备注
     */
    public function __construct(
        public int $user_id,
        public string $nickname,
        public string $remark,
        ...$args
    ) {
    }
}
