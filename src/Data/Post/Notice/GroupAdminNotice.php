<?php

namespace Itwmw\GoCqHttp\Data\Post\Notice;

use JetBrains\PhpStorm\ExpectedValues;

/**
 * 群管理员变动
 */
class GroupAdminNotice extends BaseNotice
{
    /** @var string 事件子类型, 分别表示设置和取消管理员 */
    #[ExpectedValues(values: ['set', 'unset'])]
    public string $sub_type;

    /** @var int 群号 */
    public int $group_id;

    /** @var int 管理员 QQ 号 */
    public int $user_id;
}
