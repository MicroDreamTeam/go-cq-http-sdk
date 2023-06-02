<?php

namespace Itwmw\GoCqHttp\Data;

class GetImage extends CreateData
{
    /**
     * @param int    $size     图片源文件大小
     * @param string $filename 图片文件原名
     * @param string $url      图片下载地址
     */
    public function __construct(
        public int $size,
        public string $filename,
        public string $url,
        ...$args
    ) {
    }
}
