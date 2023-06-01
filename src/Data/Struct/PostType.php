<?php

namespace Itwmw\GoCqHttp\Data\Struct;

/**
 * 上报类型
 */
class PostType
{
    /** @var string 消息, 例如, 群聊消息 */
    public const MESSAGE = 'message';

    /** @var string 请求, 例如, 好友申请 */
    public const REQUEST = 'request';

    /** @var string 通知, 例如, 群成员增加 */
    public const NOTICE = 'notice';

    /** @var string 元事件, 例如, go-cqhttp 心跳包 */
    public const META_EVENT = 'meta_event';
}
