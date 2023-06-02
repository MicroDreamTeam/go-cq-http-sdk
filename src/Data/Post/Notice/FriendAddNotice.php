<?php

namespace Itwmw\GoCqHttp\Data\Post\Notice;

/**
 * 好友添加
 */
class FriendAddNotice extends BaseNotice
{
    /** @var int 新添加好友 QQ 号 */
    public int $user_id;
}
