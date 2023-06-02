<?php

namespace Itwmw\GoCqHttp\Data\Post\Notice;

/**
 * 群消息撤回
 */
class GroupRecallNotice extends BaseNotice
{
    /** @var int 群号 */
    public int $group_id;

    /** @var int 消息发送者 QQ 号 */
    public int $user_id;

    /** @var int 操作者 QQ 号 */
    public int $operator_id;

    /** @var int 被撤回的消息 ID */
    public int $message_id;
}
