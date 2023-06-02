<?php

namespace Itwmw\GoCqHttp\Data\Struct;

use Itwmw\GoCqHttp\Data\CreateData;

class Folder extends CreateData
{
    /**
     * @param int    $group_id         群号
     * @param string $folder_id        文件夹ID
     * @param string $folder_name      文件名
     * @param int    $create_time      创建时间
     * @param int    $creator          创建者
     * @param string $creator_name     创建者名字
     * @param int    $total_file_count 子文件数量
     */
    public function __construct(
        public int $group_id,
        public string $folder_id,
        public string $folder_name,
        public int $create_time,
        public int $creator,
        public string $creator_name,
        public int $total_file_count,
        ...$args
    ) {
    }
}
