<?php

namespace Itwmw\GoCqHttp\Data\Struct;

use Itwmw\GoCqHttp\Data\CreateData;

class TalkativeHonorInfo extends CreateData
{
    /**
     * @param int    $user_id  QQ 号
     * @param string $nickname 昵称
     * @param string $avatar   头像 URL
     * @param int    $day_count 持续天数
     */
    public function __construct(
        public readonly int $user_id,
        public readonly string $nickname,
        public readonly string $avatar,
        public readonly int $day_count,
        ...$args
    ) {
    }
}
