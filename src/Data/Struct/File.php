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
        public int $group_id,
        public string $file_id,
        public string $file_name,
        public int $busid,
        public int $file_size,
        public int $upload_time,
        public int $dead_time,
        public int $modify_time,
        public int $download_times,
        public int $uploader,
        public string $uploader_name,
        ...$args
    ) {
    }
}
