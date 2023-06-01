<?php

namespace Itwmw\GoCqHttp\Apis;

use Itwmw\GoCqHttp\Data\ArrayData;
use Itwmw\GoCqHttp\Data\GetGroupNotice;
use Itwmw\GoCqHttp\Data\Struct\Anonymous;

class GroupAction extends BaseApi
{
    /**
     * 群单人禁言
     *
     * @param int $group_id 群号
     * @param int $user_id  要禁言的 QQ 号
     * @param int $duration 禁言时长, 单位秒, 0 表示取消禁言
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function setGroupBan(int $group_id, int $user_id, int $duration = 30 * 60): void
    {
        $this->client->post('/set_group_ban', [
            'form_params' => compact('group_id', 'user_id', 'duration')
        ]);
    }

    /**
     * 群全员禁言
     *
     * @param int  $group_id 群号
     * @param bool $enable   true 为开启, false 为关闭
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function setGroupWholeBan(int $group_id, bool $enable = true): void
    {
        $this->client->post('/set_group_whole_ban', [
            'form_params' => compact('group_id', 'enable')
        ]);
    }

    /**
     * 群匿名用户禁言
     *
     * @param int                  $group_id       群号
     * @param Anonymous|array|null $anonymous      可选, 要禁言的匿名用户对象（群消息上报的 anonymous 字段）
     * @param string|null          $anonymous_flag 可选, 要禁言的匿名用户的 flag（需从群消息上报的数据中获得）
     * @param int                  $duration       禁言时长, 单位秒, 无法取消匿名用户禁言
     *
     * @return void
     *
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function setGroupAnonymousBan(
        int $group_id,
        null|Anonymous|array $anonymous = null,
        string $anonymous_flag = null,
        int $duration = 30 * 60
    ): void {
        if (empty($anonymous) && empty($anonymous_flag)) {
            throw new \Itwmw\GoCqHttp\Exceptions\ApiException('匿名用户对象和匿名用户flag不能同时为空');
        }
        if ($anonymous instanceof Anonymous) {
            $anonymous = $anonymous->toArray();
        }
        $this->client->post('/set_group_anonymous_ban', [
            'form_params' => compact('group_id', 'anonymous', 'anonymous_flag', 'duration')
        ]);
    }

    /**
     * 设置精华消息
     *
     * @param int $message_id 消息ID
     *
     * @return void
     *
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function setEssenceMsg(int $message_id): void
    {
        $this->client->post('/set_essence_msg', [
            'form_params' => compact('message_id')
        ]);
    }

    /**
     * 移出精华消息
     *
     * @param int $message_id 消息ID
     *
     * @return void
     *
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function deleteEssenceMsg(int $message_id): void
    {
        $this->client->post('/delete_essence_msg', [
            'form_params' => compact('message_id')
        ]);
    }

    /**
     * 群打卡
     *
     * @param int $group_id 群号
     *
     * @return void
     *
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function sendGroupSign(int $group_id): void
    {
        $this->client->post('/send_group_sign', [
            'form_params' => compact('group_id')
        ]);
    }

    /**
     * 群设置匿名
     *
     * @param int  $group_id 群号
     * @param bool $enable   是否允许匿名聊天
     *
     * @return void
     *
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function setGroupAnonymous(int $group_id, bool $enable = true): void
    {
        $this->client->post('/set_group_anonymous', [
            'form_params' => compact('group_id', 'enable')
        ]);
    }

    /**
     * 发送群公告
     *
     * @param int    $group_id 群号
     * @param string $content  公告内容
     * @param string $image    图片路径（可选）
     *
     * @return void
     *
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function sendGroupNotice(int $group_id, string $content, string $image = ''): void
    {
        $this->client->post('/_send_group_notice', [
            'form_params' => compact('group_id', 'content', 'image')
        ]);
    }

    /**
     * 获取群公告
     *
     * @param int $group_id 群号
     *
     * @return ArrayData<int, GetGroupNotice>
     *
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getGroupNotice(int $group_id): ArrayData
    {
        return $this->client->post('/_get_group_notice', [
            'form_params' => compact('group_id')
        ])->getData();
    }

    /**
     * 群组踢人
     *
     * @param int  $group_id           群号
     * @param int  $user_id            要踢的 QQ 号
     * @param bool $reject_add_request 拒绝此人的加群请求
     *
     * @return void
     *
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function setGroupKick(int $group_id, int $user_id, bool $reject_add_request = false): void
    {
        $this->client->post('/set_group_kick', [
            'form_params' => compact('group_id', 'user_id', 'reject_add_request')
        ]);
    }

    /**
     * 退出群组
     *
     * @param int  $group_id   群号
     * @param bool $is_dismiss 是否解散, 如果登录号是群主, 则仅在此项为 true 时能够解散
     *
     * @return void
     *
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function setGroupLeave(int $group_id, bool $is_dismiss = false): void
    {
        $this->client->post('/set_group_leave', [
            'form_params' => compact('group_id', 'is_dismiss')
        ]);
    }
}
