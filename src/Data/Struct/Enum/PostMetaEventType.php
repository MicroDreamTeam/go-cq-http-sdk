<?php

namespace Itwmw\GoCqHttp\Data\Struct\Enum;

/**
 * 元事件类型
 */
class PostMetaEventType
{
    /** @var string 生命周期 */
    public const LIFECYCLE = 'lifecycle';

    /** @var string 心跳包 */
    public const HEARTBEAT = 'heartbeat';
}
