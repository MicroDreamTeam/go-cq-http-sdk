<?php

namespace Itwmw\GoCqHttp\Data;

use JetBrains\PhpStorm\ExpectedValues;

class GetStrangerInfo extends CreateData
{
    /**
     * @param int    $user_id    QQ 号
     * @param string $nickname   昵称
     * @param string $sex        性别, male 或 female 或 unknown
     * @param int    $age        年龄
     * @param string $qid        qid ID身份卡
     * @param int    $level      等级
     * @param int    $login_days 登录天数
     */
    public function __construct(
        public readonly int $user_id,
        public readonly string $nickname,
        #[ExpectedValues(values: ['male', 'female', 'unknown'])]
        public readonly string $sex,
        public readonly int $age,
        public readonly string $qid,
        public readonly int $level,
        public readonly int $login_days,
        ...$args
    ) {
    }
}
