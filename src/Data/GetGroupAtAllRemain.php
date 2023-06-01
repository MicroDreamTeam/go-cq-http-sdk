<?php

namespace Itwmw\GoCqHttp\Data;

class GetGroupAtAllRemain extends CreateData
{
    /**
     * @param bool  $can_at_all                    是否可以 @全体成员
     * @param int   $remain_at_all_count_for_group 群内所有管理当天剩余 @全体成员 次数
     * @param int   $remain_at_all_count_for_uin   Bot 当天剩余 @全体成员 次数
     */
    public function __construct(
        public readonly bool $can_at_all,
        public readonly int $remain_at_all_count_for_group,
        public readonly int $remain_at_all_count_for_uin,
    ) {
    }
}
