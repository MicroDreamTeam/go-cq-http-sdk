<?php

namespace Itwmw\GoCqHttp\Data\Post\Notice;

use JetBrains\PhpStorm\ExpectedValues;

/**
 * 精华消息变更
 */
class EssenceNotice extends BaseNotice
{
    /** @var string 消息类型 添加为add,移出为delete*/
    #[ExpectedValues(values: ['add', 'delete'])]
    public string $sub_type;

    /** @var int 群号 */
    public int $group_id;

    /** @var int 消息发送者ID */
    public int $sender_id;

    /** @var int 操作者ID */
    public int $operator_id;

    /** @var int 消息ID */
    public int $message_id;
}
