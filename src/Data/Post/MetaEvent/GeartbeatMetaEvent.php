<?php

namespace Itwmw\GoCqHttp\Data\Post\MetaEvent;

use Itwmw\GoCqHttp\Data\Struct\Status;

class GeartbeatMetaEvent extends BaseMetaEvent
{
    //status	Status 参考	-	应用程序状态
    //interval	int64	-	距离上一次心跳包的时间(单位是毫秒)

    public Status $status;

    public int $interval;
}
