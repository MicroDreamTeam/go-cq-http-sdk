<?php

namespace Itwmw\GoCqHttp\Data\Struct;

use Itwmw\GoCqHttp\Data\CreateData;

class Device extends CreateData
{
    /**
     * @param int    $app_id       客户端ID
     * @param string $device_name  设备名称
     * @param string $device_kind  设备类型
     */
    public function __construct(
        public int $app_id,
        public string $device_name,
        public string $device_kind,
        ...$args
    ) {
    }
}
