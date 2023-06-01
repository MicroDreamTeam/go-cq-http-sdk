<?php

namespace Itwmw\GoCqHttp\Apis;

use Itwmw\GoCqHttp\Data\ArrayData;
use Itwmw\GoCqHttp\Data\GetGroupMsgHistory;
use Itwmw\GoCqHttp\Data\GetMsg;
use JetBrains\PhpStorm\ExpectedValues;

class Message extends BaseApi
{
    /**
     * 发送私聊消息
     *
     * @param int      $user_id     对方 QQ 号
     * @param string   $message     要发送的内容
     * @param int|null $group_id    主动发起临时会话时的来源群号(可选, 机器人本身必须是管理员/群主)
     * @param bool     $auto_escape 消息内容是否作为纯文本发送 ( 即不解析 CQ 码 ) , 只在 message 字段是字符串时有效
     *
     * @return int 消息 ID
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function sendPrivateMsg(int $user_id, string $message, ?int $group_id = null, bool $auto_escape = false): int
    {
        return $this->client->post('/send_private_msg', [
            'form_params' => compact('user_id', 'message', 'group_id', 'auto_escape')
        ])->getData()['message_id'];
    }

    /**
     * 发送群消息
     *
     * @param int    $group_id    群号
     * @param string $message     要发送的内容
     * @param bool   $auto_escape 消息内容是否作为纯文本发送 ( 即不解析 CQ 码 ) , 只在 message 字段是字符串时有效
     *
     * @return int 消息 ID
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function sendGroupMsg(int $group_id, string $message, bool $auto_escape = false): int
    {
        return $this->client->post('/send_group_msg', [
            'form_params' => compact('group_id', 'message', 'auto_escape')
        ])->getData()['message_id'];
    }

    /**
     * 发送消息
     *
     * @param string      $message      要发送的内容
     * @param string|null $message_type 消息类型, 支持 private、group , 分别对应私聊、群组, 如不传入, 则根据传入的 *_id 参数判断
     * @param int|null    $user_id      对方 QQ 号 ( 消息类型为 private 时需要 )
     * @param int|null    $group_id     群号 ( 消息类型为 group 时需要 )
     * @param bool        $auto_escape  消息内容是否作为纯文本发送 ( 即不解析 CQ 码 ) , 只在 message 字段是字符串时有效
     *
     * @return int 消息 ID
     *
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function sendMsg(
        string $message,
        #[ExpectedValues(values: ['private', 'group'])]
        ?string $message_type = null,
        ?int $user_id = null,
        ?int $group_id = null,
        bool $auto_escape = false
    ): int {
        if (empty($user_id) && empty($group_id)) {
            throw new \Itwmw\GoCqHttp\Exceptions\ApiException('QQ号和群号不能同时为空');
        }

        return $this->client->post('/send_msg', [
            'form_params' => compact('message_type', 'user_id', 'message', 'group_id', 'auto_escape')
        ])->getData()['message_id'];
    }

    /**
     * 获取消息
     *
     * @param int $message_id 消息ID
     *
     * @return GetMsg
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getMsg(int $message_id): GetMsg
    {
        return $this->client->get('/get_msg', [
            'query' => compact('message_id')
        ])->getData();
    }

    /**
     * 撤回消息
     *
     * @param int $message_id 消息ID
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function deleteMsg(int $message_id): void
    {
        $this->client->post('/delete_msg', [
            'form_params' => compact('message_id')
        ]);
    }

    /**
     * 标记消息已读
     *
     * @param int $message_id 消息ID
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function markMsgAsRead(int $message_id): void
    {
        $this->client->post('/mark_msg_as_read', [
            'form_params' => compact('message_id')
        ]);
    }

    /**
     * 获取合并转发内容
     *
     * @param string $message_id 消息id，对应合并转发中的 id 字段
     *
     * @return array<int, array{
     *     content: string,
     *     sender: array{
     *         user_id: int,
     *         nickname: string,
     *     },
     *     time: int
     * }>
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getForwardMsg(string $message_id): array
    {
        return $this->client->get('/get_forward_msg', [
            'query' => compact('message_id')
        ])->getData()['messages'] ?? [];
    }

    /**
     * 发送合并转发 ( 群聊 )
     *
     * @param int   $group_id 群号
     * @param array $messages 自定义转发消息
     *
     * @return array{
     *     message_id: int,
     *     forward_id: int
     * } 返回消息 ID 和合并转发 ID
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     *
     * @link https://docs.go-cqhttp.org/cqcode/#%E5%90%88%E5%B9%B6%E8%BD%AC%E5%8F%91%E6%B6%88%E6%81%AF%E8%8A%82%E7%82%B9
     */
    public function sendGroupForwardMsg(int $group_id, array $messages): array
    {
        return $this->client->post('/send_group_forward_msg', [
            'form_params' => compact('group_id', 'messages')
        ])->getData();
    }

    /**
     * 发送合并转发 ( 群聊 )
     *
     * @param int   $user_id  好友QQ号
     * @param array $messages 自定义转发消息
     *
     * @return array{
     *     message_id: int,
     *     forward_id: int
     * } 返回消息 ID 和合并转发 ID
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     *
     * @link https://docs.go-cqhttp.org/cqcode/#%E5%90%88%E5%B9%B6%E8%BD%AC%E5%8F%91%E6%B6%88%E6%81%AF%E8%8A%82%E7%82%B9
     */
    public function sendPrivateForwardMsg(int $user_id, array $messages): array
    {
        return $this->client->post('/send_private_forward_msg', [
            'form_params' => compact('user_id', 'messages')
        ])->getData();
    }

    /**
     * 获取群消息历史记录
     *
     * @param int $group_id    群号
     * @param int $message_seq 起始消息序号, 可通过 get_msg 获得
     *
     * @return ArrayData<int, GetGroupMsgHistory>
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getGroupMsgHistory(int $group_id, int $message_seq = 0): ArrayData
    {
        return $this->client->get('/get_group_msg_history', [
            'query' => compact('group_id', 'message_seq')
        ])->getData();
    }
}
