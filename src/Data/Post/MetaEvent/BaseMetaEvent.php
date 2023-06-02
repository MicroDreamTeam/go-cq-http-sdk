<?php

namespace Itwmw\GoCqHttp\Data\Post\MetaEvent;

use Itwmw\GoCqHttp\Data\Post\BasePostMessage;
use Itwmw\GoCqHttp\Data\Struct\Enum\PostMetaEventType;
use JetBrains\PhpStorm\ExpectedValues;

/**
 * 元事件上报
 */
class BaseMetaEvent extends BasePostMessage
{
    /** @var string 元事件类型 */
    #[ExpectedValues(valuesFromClass: PostMetaEventType::class)]
    public string $meta_event_type;
}
