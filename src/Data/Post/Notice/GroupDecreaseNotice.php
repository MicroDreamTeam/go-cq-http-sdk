<?php

namespace Itwmw\GoCqHttp\Data\Post\Notice;

use JetBrains\PhpStorm\ExpectedValues;

/**
 * 群成员减少
 */
class GroupDecreaseNotice extends BaseNotice
{
    /** @var string 事件子类型, 分别表示主动退群、成员被踢、登录号被踢 */
    #[ExpectedValues(values: ['leave', 'kick', 'kick_me'])]
    public string $sub_type;

    /** @var int 群号 */
    public int $group_id;

    /** @var int 操作者 QQ 号 ( 如果是主动退群, 则和 user_id 相同 ) */
    public int $operator_id;

    /** @var int 离开者 QQ 号 */
    public int $user_id;
}
