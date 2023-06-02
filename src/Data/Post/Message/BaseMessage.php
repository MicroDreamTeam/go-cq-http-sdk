<?php

namespace Itwmw\GoCqHttp\Data\Post\Message;

use Itwmw\GoCqHttp\Data\Post\BasePostMessage;
use Itwmw\GoCqHttp\Data\Struct\Enum\PostMessageSubType;
use Itwmw\GoCqHttp\Data\Struct\Enum\PostMessageType;
use Itwmw\GoCqHttp\Data\Struct\Sender;
use JetBrains\PhpStorm\ExpectedValues;

/**
 * 消息上报
 */
class BaseMessage extends BasePostMessage
{
    /** @var string 消息类型 */
    #[ExpectedValues(valuesFromClass: PostMessageType::class)]
    public string $message_type;

    /** @var int 消息子类型 */
    #[ExpectedValues(valuesFromClass: PostMessageSubType::class)]
    public int $sub_type;

    /** @var int 消息 ID */
    public int $message_id;

    /** @var int 发送者 QQ 号 */
    public int $user_id;

    /** @var string 消息内容 */
    public string $message;

    /** @var string 原始消息内容 */
    public string $raw_message;

    /** @var int 字体 */
    public int $font;

    /** @var Sender 发送者信息 */
    public Sender $sender;
}
