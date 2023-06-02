<?php

namespace Itwmw\GoCqHttp\Data\Post\Notice;

/**
 * 群红包运气王提示
 *
 * 此事件无法在手表协议上触发
 */
class LuckyKingNotice extends BaseSubNotice
{
    /** @var int 群号 */
    public int $group_id;

    /** @var int 红包发送者id */
    public int $user_id;

    /** @var int 运气王id */
    public int $target_id;
}
