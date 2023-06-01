<?php

namespace Itwmw\GoCqHttp\Data\Struct;

use Itwmw\GoCqHttp\Data\CreateData;

class HonorInfo extends CreateData
{
    /**
     * @param int    $user_id     QQ 号
     * @param string $nickname    昵称
     * @param string $avatar      头像 URL
     * @param string $description 荣誉描述
     */
    public function __construct(
        public readonly int $user_id,
        public readonly string $nickname,
        public readonly string $avatar,
        public readonly string $description,
    ) {
    }
}
