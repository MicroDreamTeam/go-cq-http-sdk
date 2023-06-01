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
        public readonly int $group_id,
        public readonly int $user_id,
        public readonly string $nickname,
        public readonly string $card,
        public readonly string $sex,
        public readonly int $age,
        public readonly string $area,
        public readonly int $join_time,
        public readonly int $last_sent_time,
        public readonly string $level,
        public readonly string $role,
        public readonly bool $unfriendly,
        public readonly string $title,
        public readonly int $title_expire_time,
        public readonly bool $card_changeable,
        public readonly int $shut_up_timestamp,
    ) {
    }
}
