<?php

namespace Itwmw\GoCqHttp\Data;

use Itwmw\GoCqHttp\Data\Struct\InvitedRequest;
use Itwmw\GoCqHttp\Data\Struct\JoinRequest;

class GetGroupSystemMsg extends CreateData
{
    /** @var ArrayData<int, InvitedRequest>|null 邀请消息列表 */
    public readonly ?ArrayData $invited_requests;

    /** @var ArrayData<int, JoinRequest>|null 进群消息列表 */
    public readonly ?ArrayData $join_requests;

    /**
     * @param array|null $invited_requests 邀请消息列表
     * @param array|null $join_requests    进群消息列表
     */
    public function __construct(?array $invited_requests = null, ?array $join_requests = null, ...$args)
    {
        $this->invited_requests = $invited_requests ? $this->createArrayData($invited_requests, InvitedRequest::class) : null;
        $this->join_requests    = $join_requests ? $this->createArrayData($join_requests, JoinRequest::class) : null;
    }
}
