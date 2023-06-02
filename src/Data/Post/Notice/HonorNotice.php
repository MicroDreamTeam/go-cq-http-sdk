<?php

namespace Itwmw\GoCqHttp\Data\Post\Notice;

use JetBrains\PhpStorm\ExpectedValues;

/**
 * 群成员荣誉变更提示
 */
class HonorNotice extends BaseSubNotice
{
    /** @var int 群号 */
    public int $group_id;

    /** @var int 成员id */
    public int $user_id;

    /** @var string 荣誉类型 talkative:龙王 performer:群聊之火 emotion:快乐源泉 */
    #[ExpectedValues(values: ['talkative', 'performer', 'emotion'])]
    public string $honor_type;
}
