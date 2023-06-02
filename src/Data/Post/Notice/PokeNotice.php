<?php

namespace Itwmw\GoCqHttp\Data\Post\Notice;

/**
 * 好友\群内戳一戳（双击头像）
 *
 * 群内戳一戳时，事件无法在手表协议上触发
 */
class PokeNotice extends BaseSubNotice
{
    /** @var int 发送者 QQ 号 */
    public int $sender_id;

    /** @var int 发送者 QQ 号 */
    public int $user_id;

    /** @var int 群号 */
    public int $group_id;

    /** @var int 被戳者 QQ 号 */
    public int $target_id;
}
