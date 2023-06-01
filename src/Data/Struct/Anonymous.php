<?php

namespace Itwmw\GoCqHttp\Data\Struct;

use Itwmw\GoCqHttp\Data\CreateData;

/**
 * 匿名信息
 */
class Anonymous extends CreateData
{
    /**
     * @param int    $id   匿名用户 ID
     * @param string $name 匿名用户名称
     * @param string $flag 匿名用户 flag, 在调用禁言 API 时需要传入
     */
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $flag,
        ...$args
    ) {
    }
}
