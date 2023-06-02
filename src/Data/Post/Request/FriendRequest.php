<?php

namespace Itwmw\GoCqHttp\Data\Post\Request;

use Itwmw\GoCqHttp\Exceptions\PostMessageException;

/**
 * 加好友请求
 */
class FriendRequest extends BaseRequest
{
    /** @var int 发送请求的 QQ 号 */
    public int $user_id;

    /** @var string 验证信息 */
    public string $comment;

    /** @var string 请求 flag, 在调用处理请求的 API 时需要传入 */
    public string $flag;

    /**
     * 快捷响应
     *
     * @param bool   $approve 是否同意请求
     * @param string $remark  添加后的好友备注 ( 仅在同意时有效 )
     *
     * @return string
     *
     * @throws PostMessageException
     */
    public function response(bool $approve, string $remark = ''): string
    {
        $result = json_encode(compact('approve', 'remark'));
        if (false === $result) {
            throw new PostMessageException('回复消息失败');
        }
        return $result;
    }
}
