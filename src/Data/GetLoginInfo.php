<?php

namespace Itwmw\GoCqHttp\Data;

class GetLoginInfo extends CreateData
{
    /**
     * @param int    $user_id  QQ 号
     * @param string $nickname QQ 昵称
     */
    public function __construct(
        public int $user_id,
        public string $nickname,
        ...$args
    ) {
    }
}
