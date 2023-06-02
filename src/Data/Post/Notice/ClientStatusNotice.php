<?php

namespace Itwmw\GoCqHttp\Data\Post\Notice;

use Itwmw\GoCqHttp\Data\Struct\Device;

/**
 * 其他客户端在线状态变更
 */
class ClientStatusNotice extends BaseNotice
{
    /** @var Device 客户端信息 */
    public Device $client;

    /** @var bool 当前是否在线 */
    public bool $online;
}
