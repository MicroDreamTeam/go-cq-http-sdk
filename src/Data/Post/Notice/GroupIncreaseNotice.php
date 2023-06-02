<?php

namespace Itwmw\GoCqHttp\Data\Post\Notice;

use JetBrains\PhpStorm\ExpectedValues;

/**
 * 群成员增加
 */
class GroupIncreaseNotice extends BaseNotice
{
    /** @var string 事件子类型, 分别表示管理员已同意入群、管理员邀请入群 */
    #[ExpectedValues(values: ['approve', 'invite'])]
    public string $sub_type;

    /** @var int 群号 */
    public int $group_id;

    /** @var int 操作者 QQ 号 */
    public int $operator_id;

    /** @var int 加入者 QQ 号 */
    public int $user_id;
}
