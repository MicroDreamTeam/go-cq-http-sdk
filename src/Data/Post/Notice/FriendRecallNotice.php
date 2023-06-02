<?php

namespace Itwmw\GoCqHttp\Data\Post\Notice;

/**
 * 私聊消息撤回
 */
class FriendRecallNotice extends BaseNotice
{
    /** @var int 好友 QQ 号 */
    public int $user_id;

    /** @var int 被撤回的消息 ID */
    public int $message_id;
}
