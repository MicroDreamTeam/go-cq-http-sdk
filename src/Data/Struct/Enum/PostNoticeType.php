<?php

namespace Itwmw\GoCqHttp\Data\Struct\Enum;

/**
 * 通知类型
 */
class PostNoticeType
{
    /** @var string 群文件上传 */
    public const GROUP_UPLOAD = 'group_upload';

    /** @var string 群管理员变更 */
    public const GROUP_ADMIN = 'group_admin';

    /** @var string 群成员减少 */
    public const GROUP_DECREASE = 'group_decrease';

    /** @var string 群成员增加 */
    public const GROUP_INCREASE = 'group_increase';

    /** @var string 群成员禁言 */
    public const GROUP_BAN = 'group_ban';

    /** @var string 好友添加 */
    public const FRIEND_ADD = 'friend_add';

    /** @var string 群消息撤回 */
    public const GROUP_RECALL = 'group_recall';

    /** @var string 好友消息撤回 */
    public const FRIEND_RECALL = 'friend_recall';

    /** @var string 群名片变更 */
    public const GROUP_CARD = 'group_card';

    /** @var string 离线文件上传 */
    public const OFFLINE_FILE = 'offline_file';

    /** @var string 客户端状态变更 */
    public const CLIENT_STATUS = 'client_status';

    /** @var string 精华消息 */
    public const ESSENCE = 'essence';

    /** @var string 系统通知 */
    public const NOTIFY = 'notify';
}
