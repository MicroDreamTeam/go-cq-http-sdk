<?php

namespace Itwmw\GoCqHttp\Data\Post;

class PostMessageType
{
    /** @var string 群消息 */
    public const GROUP_MESSAGE = Message\GroupMessage::class;

    /** @var string 私聊消息 */
    public const PRIVATE_MESSAGE = Message\PrivateMessage::class;

    /** @var string 心跳包事件 */
    public const GEART_BEAT_META_EVENT = MetaEvent\GeartbeatMetaEvent::class;

    /** @var string 其他客户端在线状态变更通知 */
    public const CLIENT_STATUS_NOTICE = Notice\ClientStatusNotice::class;

    /** @var string 精华消息变更通知 */
    public const ESSENCE_NOTICE = Notice\EssenceNotice::class;

    /** @var string 好友添加通知 */
    public const FRIEND_ADD_NOTICE = Notice\FriendAddNotice::class;

    /** @var string 私聊消息撤回通知 */
    public const FRIEND_RECALL_NOTICE = Notice\FriendRecallNotice::class;

    /** @var string 群管理员变动通知 */
    public const GROUP_ADMIN_NOTICE = Notice\GroupAdminNotice::class;

    /** @var string 群禁言通知 */
    public const GROUP_BAN_NOTICE = Notice\GroupBanNotice::class;

    /** @var string 群成员名片更新通知 */
    public const GROUP_CARD_NOTICE = Notice\GroupCardNotice::class;

    /** @var string 群成员减少通知 */
    public const GROUP_DECREASE_NOTICE = Notice\GroupDecreaseNotice::class;

    /** @var string 群成员增加通知 */
    public const GROUP_INCREASE_NOTICE = Notice\GroupIncreaseNotice::class;

    /** @var string 群消息撤回通知 */
    public const GROUP_RECALL_NOTICE = Notice\GroupRecallNotice::class;

    /** @var string 群文件上传通知 */
    public const GROUP_UPLOAD_NOTICE = Notice\GroupUploadNotice::class;

    /** @var string 群成员荣誉变更提示 */
    public const HONOR_NOTICE = Notice\HonorNotice::class;

    /** @var string 群红包运气王提示 */
    public const LUCKY_KING_NOTICE = Notice\LuckyKingNotice::class;

    /** @var string 接收到离线文件通知 */
    public const OFFLINE_FILE_NOTICE = Notice\OfflineFileNotice::class;

    /** @var string 好友\群内戳一戳（双击头像）通知 */
    public const POKE_NOTICE = Notice\PokeNotice::class;

    /** @var string 群成员头衔变更通知 */
    public const TITLE_NOTICE = Notice\TitleNotice::class;

    /** @var string 加好友请求 */
    public const FRIEND_REQUEST = Request\FriendRequest::class;

    /** @var string 加群请求 */
    public const GROUP_REQUEST = Request\GroupRequest::class;
}
