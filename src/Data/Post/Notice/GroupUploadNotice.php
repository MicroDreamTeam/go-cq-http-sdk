<?php

namespace Itwmw\GoCqHttp\Data\Post\Notice;

/**
 * 群文件上传
 */
class GroupUploadNotice extends BaseNotice
{
    /** @var int 群号 */
    public int $group_id;

    /** @var int 发送者 QQ 号 */
    public int $user_id;

    /**
     * @var array{
     *     id: int,
     *     name: string,
     *     size: int,
     *     busid: int
     * } 文件信息
     */
    public array $file;
}
