<?php

namespace Itwmw\GoCqHttp\Apis;

use Itwmw\GoCqHttp\Data\ArrayData;
use Itwmw\GoCqHttp\Data\GetEssenceMsgList;
use Itwmw\GoCqHttp\Data\GetGroupAtAllRemain;
use Itwmw\GoCqHttp\Data\GetGroupHonorInfo;
use Itwmw\GoCqHttp\Data\GetGroupInfo;
use Itwmw\GoCqHttp\Data\GetGroupMemberInfo;
use Itwmw\GoCqHttp\Data\GetGroupMemberList;
use Itwmw\GoCqHttp\Data\GetGroupSystemMsg;
use JetBrains\PhpStorm\ExpectedValues;

class GroupInfo extends BaseApi
{
    /**
     * 获取群信息
     *
     * @param int  $group_id 群号
     * @param bool $no_cache 是否不使用缓存（使用缓存可能更新不及时, 但响应更快）
     *
     * @return GetGroupInfo
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getGroupInfo(int $group_id, bool $no_cache = false): GetGroupInfo
    {
        return $this->client->get('/get_group_info', [
            'query' => compact('group_id', 'no_cache')
        ])->getData();
    }

    /**
     * 获取群列表
     *
     * @param bool $no_cache
     *
     * @return ArrayData<int, GetGroupInfo> 是否不使用缓存（使用缓存可能更新不及时, 但响应更快）
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getGroupList(bool $no_cache = false): ArrayData
    {
        return $this->client->get('/get_group_list', [
            'query' => compact('no_cache')
        ])->getData();
    }

    /**
     * 获取群成员信息
     *
     * @param int  $group_id 群号
     * @param int  $user_id  QQ 号
     * @param bool $no_cache 是否不使用缓存（使用缓存可能更新不及时, 但响应更快）
     *
     * @return GetGroupMemberInfo
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getGroupMemberInfo(int $group_id, int $user_id, bool $no_cache = false): GetGroupMemberInfo
    {
        return $this->client->get('/get_group_member_info', [
            'query' => compact('group_id', 'user_id', 'no_cache')
        ])->getData();
    }

    /**
     * 获取群成员列表
     *
     * @param int  $group_id 群号
     * @param bool $no_cache 是否不使用缓存（使用缓存可能更新不及时, 但响应更快）
     *
     * @return ArrayData<int, GetGroupMemberList>
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getGroupMemberList(int $group_id, bool $no_cache = false): ArrayData
    {
        return $this->client->get('/get_group_member_list', [
            'query' => compact('group_id', 'no_cache')
        ])->getData();
    }

    /**
     * 获取群荣誉信息
     *
     * @param int    $group_id 群号
     * @param string $type
     * 要获取的群荣誉类型, 可传入 talkative performer legend strong_newbie emotion 以分别获取单个类型的群荣誉数据,
     * 或传入 all 获取所有数据
     *
     * @return GetGroupHonorInfo
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getGroupHonorInfo(
        int $group_id,
        #[ExpectedValues(values: ['talkative', 'performer', 'legend', 'strong_newbie', 'emotion', 'all'])]
        string $type = 'all'
    ): GetGroupHonorInfo {
        return $this->client->get('/get_group_honor_info', [
            'query' => compact('group_id', 'type')
        ])->getData();
    }

    /**
     * 获取群系统消息
     *
     * @return GetGroupSystemMsg
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getGroupSystemMsg(): GetGroupSystemMsg
    {
        return $this->client->get('/get_group_system_msg')->getData();
    }

    /**
     * 获取精华消息列表
     *
     * @param int $group_id 群号
     *
     * @return ArrayData<int, GetEssenceMsgList>
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getEssenceMsgList(int $group_id): ArrayData
    {
        return $this->client->get('/get_essence_msg_list', [
            'query' => compact('group_id')
        ])->getData();
    }

    /**
     * 获取群 @全体成员 剩余次数
     *
     * @param int $group_id 群号
     *
     * @return GetGroupAtAllRemain
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getGroupAtAllRemain(int $group_id): GetGroupAtAllRemain
    {
        return $this->client->get('/get_group_at_all_remain', [
            'query' => compact('group_id')
        ])->getData();
    }
}
