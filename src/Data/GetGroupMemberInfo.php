<?php

namespace Itwmw\GoCqHttp\Data;

class GetGroupMemberInfo extends CreateData
{
    /**
     * @param int    $group_id          群号
     * @param int    $user_id           QQ 号
     * @param string $nickname          昵称
     * @param string $card              群名片／备注
     * @param string $sex               性别, male 或 female 或 unknown
     * @param int    $age               年龄
     * @param string $area              地区
     * @param int    $join_time         加群时间戳
     * @param int    $last_sent_time    最后发言时间戳
     * @param string $level             成员等级
     * @param string $role              角色, owner 或 admin 或 member
     * @param bool   $unfriendly        是否不良记录成员
     * @param string $title             专属头衔
     * @param int    $title_expire_time 专属头衔过期时间戳
     * @param bool   $card_changeable   是否允许修改群名片
     * @param int    $shut_up_timestamp 禁言到期时间
     */
    public function __construct(
        public int $group_id,
        public int $user_id,
        public string $nickname,
        public string $card,
        public string $sex,
        public int $age,
        public string $area,
        public int $join_time,
        public int $last_sent_time,
        public string $level,
        public string $role,
        public bool $unfriendly,
        public string $title,
        public int $title_expire_time,
        public bool $card_changeable,
        public int $shut_up_timestamp,
        ...$args
    ) {
    }
}
