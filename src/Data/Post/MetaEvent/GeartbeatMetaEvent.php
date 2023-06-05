<?php

namespace Itwmw\GoCqHttp\Data\Post\MetaEvent;

use Itwmw\GoCqHttp\Data\Struct\Status;

/**
 * 心跳包
 */
class GeartbeatMetaEvent extends BaseMetaEvent
{
    public Status $status;

    public int $interval;
}
