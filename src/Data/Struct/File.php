<?php

namespace Itwmw\GoCqHttp\Data\Struct;

use Itwmw\GoCqHttp\Data\CreateData;

class File extends CreateData
{
    /**
     * @param int    $group_id       群号
     * @param string $file_id        文件ID
     * @param string $file_name      文件名
     * @param int    $busid          文件类型
     * @param int    $file_size      文件大小
     * @param int    $upload_time    上传时间
     * @param int    $dead_time      过期时间,永久文件恒为0
     * @param int    $modify_time    最后修改时间
     * @param int    $download_times 下载次数
     * @param int    $uploader       上传者ID
     * @param string $uploader_name  上传者名字
     */
    public function __construct(
        public readonly int $group_id,
        public readonly string $file_id,
        public readonly string $file_name,
        public readonly int $busid,
        public readonly int $file_size,
        public readonly int $upload_time,
        public readonly int $dead_time,
        public readonly int $modify_time,
        public readonly int $download_times,
        public readonly int $uploader,
        public readonly string $uploader_name,
        ...$args
    ) {
    }
}
