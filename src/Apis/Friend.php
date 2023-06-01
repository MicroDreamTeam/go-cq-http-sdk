<?php

namespace Itwmw\GoCqHttp\Apis;

use Itwmw\GoCqHttp\Data\ArrayData;
use Itwmw\GoCqHttp\Data\GetFriendList;
use Itwmw\GoCqHttp\Data\GetUnidirectionalFriendList;

class Friend extends BaseApi
{
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
