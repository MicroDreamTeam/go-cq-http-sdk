<?php

namespace Itwmw\GoCqHttp\Data\Post\Notice;

use JetBrains\PhpStorm\ExpectedValues;

/**
 * 群禁言
 */
class GroupBanNotice extends BaseNotice
{
    /** @var string 事件子类型, 分别表示禁言、解除禁言 */
    #[ExpectedValues(values: ['ban', 'lift_ban'])]
    public string $sub_type;

    /** @var int 群号 */
    public int $group_id;

    /** @var int 操作者 QQ 号 */
    public int $operator_id;

    /** @var int 被禁言 QQ 号 (为全员禁言时为0) */
    public int $user_id;

    /** @var int 禁言时长, 单位秒 (为全员禁言时为-1) */
    public int $duration;
}
