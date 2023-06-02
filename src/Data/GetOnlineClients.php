<?php

namespace Itwmw\GoCqHttp\Data;

use Itwmw\GoCqHttp\Data\Struct\Device;

class GetOnlineClients extends CreateData
{
    /**
     * 在线客户端列表
     *
     * @var ArrayData<int, Device>
     */
    public ArrayData $clients;

    public function __construct(array $clients, ...$args)
    {
        $this->clients = $this->createArrayData($clients, Device::class);
    }
}
