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
        public int $user_id,
        public string $nickname,
        #[ExpectedValues(values: ['male', 'female', 'unknown'])]
        public string $sex,
        public int $age,
        public string $qid,
        public int $level,
        public int $login_days,
        ...$args
    ) {
    }
}
