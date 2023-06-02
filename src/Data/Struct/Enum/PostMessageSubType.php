<?php

namespace Itwmw\GoCqHttp\Data\Struct\Enum;

/**
 * 消息子类型
 */
class PostMessageSubType
{
    /** @var string 好友 */
    public const FRIEND = 'friend';

    /** @var string 群聊 */
    public const NORMAL = 'normal';

    /** @var string 匿名 */
    public const ANONYMOUS = 'anonymous';

    /** @var string 群中自身发送 */
    public const GROUP_SELF = 'group_self';

    /** @var string 群临时会话 */
    public const GROUP = 'group';

    /** @var string 系统提示 */
    public const NOTICE = 'notice';
}
