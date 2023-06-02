<?php

namespace Itwmw\GoCqHttp\Data\Post\Notice;

/**
 * 群成员头衔变更
 */
class TitleNotice extends BaseSubNotice
{
    /** @var int 群号 */
    public int $group_id;

    /** @var int 变更头衔的用户 QQ 号 */
    public int $user_id;

    /** @var string 获得的新头衔 */
    public string $title;
}
