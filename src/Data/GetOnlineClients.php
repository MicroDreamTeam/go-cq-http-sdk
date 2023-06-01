<?php

namespace Itwmw\GoCqHttp\Data;

class GetOnlineClients extends CreateData
{
    /**
     * 在线客户端列表
     *
     * @var array<int, array{
     *     app_id: int,
     *     device_name: string,
     *     device_kind: string,
     * }>
     */
    public readonly array $clients;

    public function __construct(array $clients, ...$args)
    {
        $this->clients = $clients;
    }
}
