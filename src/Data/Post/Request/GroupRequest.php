<?php

namespace Itwmw\GoCqHttp\Data\Post\Request;

use Itwmw\GoCqHttp\Exceptions\PostMessageException;
use JetBrains\PhpStorm\ExpectedValues;

/**
 * 加群请求
 */
class GroupRequest extends BaseRequest
{
    /** @var string 请求子类型, 分别表示加群请求、邀请登录号入群 */
    #[ExpectedValues(values: ['add', 'invite'])]
    public string $sub_type;

    /** @var int 群号 */
    public int $group_id;

    /** @var int 发送请求的 QQ 号 */
    public int $user_id;

    /** @var string 验证信息 */
    public string $comment;

    /** @var string 请求 flag, 在调用处理请求的 API 时需要传入 */
    public string $flag;

    /**
     * 快捷响应
     *
     * @param bool   $approve 是否同意请求／邀请
     * @param string $reason  拒绝理由 ( 仅在拒绝时有效 )
     *
     * @return string
     *
     * @throws PostMessageException
     */
    public function response(bool $approve, string $reason = ''): string
    {
        $result = json_encode(compact('approve', 'reason'));
        if (false === $result) {
            throw new PostMessageException('回复消息失败');
        }
        return $result;
    }
}
