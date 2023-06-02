<?php

namespace Itwmw\GoCqHttp\Data\Post\Message;

use Itwmw\GoCqHttp\Data\Struct\Anonymous;
use Itwmw\GoCqHttp\Exceptions\PostMessageException;

/**
 * 群消息
 */
class GroupMessage extends BaseMessage
{
    /** @var int 群号 */
    public int $group_id;

    /** @var Anonymous|null 匿名信息, 如果不是匿名消息则为 null */
    public ?Anonymous $anonymous = null;

    /**
     * 快捷响应
     *
     * @param string $reply         要回复的内容
     * @param bool   $auto_escape   消息内容是否作为纯文本发送 ( 即不解析 CQ 码 ) , 只在 reply 字段是字符串时有效
     * @param bool   $at_sender     是否要在回复开头 at 发送者 ( 自动添加 ) , 发送者是匿名用户时无效
     * @param bool   $delete        撤回该条消息
     * @param bool   $kick          把发送者踢出群组 ( 需要登录号权限足够 ) , 不拒绝此人后续加群请求, 发送者是匿名用户时无效
     * @param bool   $ban           禁言该消息发送者, 对匿名用户也有效
     * @param int    $ban_duration  若要执行禁言操作时的禁言时长
     *
     * @return string
     *
     * @throws PostMessageException
     */
    public function response(string $reply = '', bool $auto_escape = false, bool $at_sender = false, bool $delete = false, bool $kick = false, bool $ban = false, int $ban_duration = 30): string
    {
        $result = json_encode(compact('reply', 'auto_escape', 'at_sender', 'delete', 'kick', 'ban', 'ban_duration'));
        if (false === $result) {
            throw new PostMessageException('回复消息失败');
        }
        return $result;
    }
}
