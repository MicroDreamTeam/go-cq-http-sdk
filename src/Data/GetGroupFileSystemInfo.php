<?php

namespace Itwmw\GoCqHttp\Data;

class GetGroupFileSystemInfo extends CreateData
{
    /**
     * @param int $file_count  文件总数
     * @param int $limit_count 文件上限
     * @param int $used_space  已使用空间
     * @param int $total_space 空间上限
     * @param int $group_id    群号
     */
    public function __construct(
        public int $file_count,
        public int $limit_count,
        public int $used_space,
        public int $total_space,
        public int $group_id,
        ...$args
    ) {
    }
}
