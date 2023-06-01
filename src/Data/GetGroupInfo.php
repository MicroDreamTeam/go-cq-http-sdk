<?php

namespace Itwmw\GoCqHttp\Data;

class GetGroupInfo extends CreateData
{
    /**
     * @param int         $group_id          群号
     * @param string      $group_name        群名称
     * @param string|null $group_memo        群备注
     * @param int         $group_create_time 群创建时间
     * @param int         $group_level       群等级
     * @param int         $member_count      成员数
     * @param int         $max_member_count  最大成员数（群容量）
     */
    public function __construct(
        public readonly int $group_id,
        public readonly string $group_name,
        public readonly ?string $group_memo = null,
        public readonly int $group_create_time = 0,
        public readonly int $group_level = 0,
        public readonly int $member_count = 0,
        public readonly int $max_member_count = 0,
        ...$args
    ) {
    }

    /**
     * 获取群头像地址
     *
     * @return string
     */
    public function getGroupImage(): string
    {
        return "https://p.qlogo.cn/gh/{$this->group_id}/{$this->group_id}/100";
    }
}
