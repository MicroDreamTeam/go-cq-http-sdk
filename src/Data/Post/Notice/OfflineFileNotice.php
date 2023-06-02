<?php

namespace Itwmw\GoCqHttp\Data\Post\Notice;

/**
 * 接收到离线文件
 */
class OfflineFileNotice extends BaseNotice
{
    /** @var int 发送者id */
    public int $user_id;

    /**
     * @var array{
     *     name: string,
     *     size: int,
     *     url: string,
     * } 文件数据
     */
    public array $file;
}
