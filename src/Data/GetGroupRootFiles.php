<?php

namespace Itwmw\GoCqHttp\Data;

use Itwmw\GoCqHttp\Data\Struct\File;
use Itwmw\GoCqHttp\Data\Struct\Folder;

class GetGroupRootFiles extends CreateData
{
    /** @var ArrayData<int, File>|null  文件列表*/
    public ?ArrayData $files;

    /** @var ArrayData<int, Folder>|null 文件夹列表 */
    public ?ArrayData $folders;

    /**
     * @param array|null $files   文件列表
     * @param array|null $folders 文件夹列表
     */
    public function __construct(
        ?array $files = null,
        ?array $folders = null,
        ...$args
    ) {
        $this->files   = $files ? $this->createArrayData($files, File::class) : null;
        $this->folders = $folders ? $this->createArrayData($folders, Folder::class) : null;
    }
}
