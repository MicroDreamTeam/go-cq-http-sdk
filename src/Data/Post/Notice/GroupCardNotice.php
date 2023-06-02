<?php

namespace Itwmw\GoCqHttp\Data\Post\Notice;

/**
 * 群成员名片更新
 *
 * 当名片为空时 card_xx 字段为空字符串, 并不是昵称
 */
class GroupCardNotice extends BaseNotice
{
    /** @var int 群号 */
    public int $group_id;

    /** @var int 成员id */
    public int $user_id;

    /** @var string 新名片 */
    public string $card_new;

    /** @var string 旧名片 */
    public string $card_old;
}
