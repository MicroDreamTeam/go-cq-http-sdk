<?php

namespace Itwmw\GoCqHttp\Apis;

use Itwmw\GoCqHttp\Data\ArrayData;
use Itwmw\GoCqHttp\Data\GetFriendList;
use Itwmw\GoCqHttp\Data\GetStrangerInfo;
use Itwmw\GoCqHttp\Data\GetUnidirectionalFriendList;

class Friend extends BaseApi
{
    /**
     * 获取陌生人信息
     *
     * @param int  $user_id  QQ 号
     * @param bool $no_cache 是否不使用缓存（使用缓存可能更新不及时, 但响应更快）
     *
     * @return GetStrangerInfo
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getStrangerInfo(int $user_id, bool $no_cache = false): GetStrangerInfo
    {
        return $this->client->post('/get_stranger_info', [
            'form_params' => compact('user_id', 'no_cache')
        ])->getData();
    }

    /**
     * 删除好友
     *
     * @param int $user_id 好友 QQ 号
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function deleteFriend(int $user_id): void
    {
        $this->client->post('/delete_friend', [
            'form_params' => compact('user_id')
        ]);
    }

    /**
     * 删除单向好友
     *
     * @param int $user_id 单向好友QQ号
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function deleteUnidirectionalFriend(int $user_id): void
    {
        $this->client->post('/delete_unidirectional_friend', [
            'form_params' => compact('user_id')
        ]);
    }

    /**
     * 获取好友列表
     *
     * @return ArrayData<int, GetFriendList>
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function GetFriendList(): ArrayData
    {
        return $this->client->post('/get_friend_list')->getData();
    }

    /**
     * 获取单向好友列表
     *
     * @return ArrayData<int, GetUnidirectionalFriendList>
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getUnidirectionalFriendList(): ArrayData
    {
        return $this->client->post('/get_unidirectional_friend_list')->getData();
    }
}
