<?php

namespace Itwmw\GoCqHttp\Apis;

class Request extends BaseApi
{
    /**
     * 处理加好友请求
     *
     * @param string $flag    加好友请求的 flag（需从上报的数据中获得
     * @param bool   $approve 是否同意请求
     * @param string $remark  添加后的好友备注（仅在同意时有效）
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function setFriendAddRequest(string $flag, bool $approve = true, string $remark = ''): void
    {
        $this->client->post('/set_friend_add_request', [
            'form_params' => compact('flag', 'approve', 'remark')
        ]);
    }

    /**
     * 处理加群请求／邀请
     *
     * @param string $flag     加好友请求的 flag（需从上报的数据中获得
     * @param string $sub_type add 或 invite, 请求类型（需要和上报消息中的 sub_type 字段相符）
     * @param bool   $approve  是否同意请求／邀请
     * @param string $reason   拒绝理由（仅在拒绝时有效）
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function setGroupAddRequest(string $flag, string $sub_type, bool $approve = true, string $reason = ''): void
    {
        $this->client->post('/set_group_add_request', [
            'form_params' => compact('flag', 'sub_type', 'approve', 'reason')
        ]);
    }
}
