<?php

namespace Itwmw\GoCqHttp\Apis;

use Itwmw\GoCqHttp\Data\GetGroupFilesByFolder;
use Itwmw\GoCqHttp\Data\GetGroupFileSystemInfo;
use Itwmw\GoCqHttp\Data\GetGroupRootFiles;
use Itwmw\GoCqHttp\Data\Struct\File as FileStruct;
use Itwmw\GoCqHttp\Data\Struct\Folder;

class GroupFile extends BaseApi
{
    /**
     * 上传群文件
     *
     * <b style="color:#e7c000">在不提供 folder 参数的情况下默认上传到根目录
     * 只能上传本地文件, 需要上传 http 文件的话请先调用 {@see Cq::downloadFile()}  API下载</b>
     *
     * @param int         $group_id 群号
     * @param string      $file     本地文件路径
     * @param string      $name     储存名称
     * @param string|null $folder   父目录ID
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function uploadGroupFile(int $group_id, string $file, string $name, ?string $folder = null): void
    {
        $this->client->post('/upload_group_file', [
            'form_params' => compact('group_id', 'file', 'name', 'folder')
        ]);
    }

    /**
     * 删除群文件
     *
     * @param int    $group_id 群号
     * @param string $file_id  文件ID 参考 {@see FileStruct File} 对象
     * @param int    $busid    文件类型 参考 {@see FileStruct File} 对象
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function deleteGroupFile(int $group_id, string $file_id, int $busid): void
    {
        $this->client->post('/delete_group_file', [
            'form_params' => compact('group_id', 'file_id', 'busid')
        ]);
    }

    /**
     * 创建群文件文件夹
     *
     * <b style="color:#e7c000">仅能在根目录创建文件夹</b>
     *
     * @param int    $group_id  群号
     * @param string $name      文件夹名称
     * @param string $parent_id 仅能为 /
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function createGroupFileFolder(int $group_id, string $name, string $parent_id = '/'): void
    {
        $this->client->post('/create_group_file_folder', [
            'form_params' => compact('group_id', 'name', 'parent_id')
        ]);
    }

    /**
     * 删除群文件文件夹
     *
     * @param int    $group_id  群号
     * @param string $folder_id 文件夹ID 参考 {@see Folder} 对象
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function deleteGroupFolder(int $group_id, string $folder_id): void
    {
        $this->client->post('/delete_group_folder', [
            'form_params' => compact('group_id', 'folder_id')
        ]);
    }

    /**
     * 获取群文件系统信息
     *
     * @param int $group_id 群号
     *
     * @return GetGroupFileSystemInfo
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getGroupFileSystemInfo(int $group_id): GetGroupFileSystemInfo
    {
        return $this->client->post('/get_group_file_system_info', [
            'form_params' => compact('group_id')
        ])->getData();
    }

    /**
     * 获取群根目录文件列表
     *
     * @param int $group_id 群号
     *
     * @return GetGroupRootFiles
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getGroupRootFiles(int $group_id): GetGroupRootFiles
    {
        return $this->client->post('/get_group_root_files', [
            'form_params' => compact('group_id')
        ])->getData();
    }

    /**
     * 获取群子目录文件列表
     *
     * @param int    $group_id  群号
     * @param string $folder_id 文件夹ID 参考 {@see Folder} 对象
     *
     * @return GetGroupFilesByFolder
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getGroupFilesByFolder(int $group_id, string $folder_id): GetGroupFilesByFolder
    {
        return $this->client->post('/get_group_files_by_folder', [
            'form_params' => compact('group_id', 'folder_id')
        ])->getData();
    }

    /**
     * 获取群文件资源链接
     *
     * @param int    $group_id 群号
     * @param string $file_id  文件ID 参考 {@see FileStruct File} 对象
     * @param int    $busid    文件类型 参考 {@see FileStruct File} 对象
     *
     * @return string 文件下载链接
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getGroupFileUrl(int $group_id, string $file_id, int $busid): string
    {
        return $this->client->post('/get_group_file_url', [
            'form_params' => compact('group_id', 'file_id', 'busid')
        ])->getData()['url'];
    }

    /**
     * 上传私聊文件
     *
     * <b style="color:#e7c000">在不提供 folder 参数的情况下默认上传到根目录
     * 只能上传本地文件, 需要上传 http 文件的话请先调用 {@see Cq::downloadFile()} API下载</b>
     *
     * @param int    $user_id 对方 QQ 号
     * @param string $file    本地文件路径
     * @param string $name    文件名称
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function uploadPrivateFile(int $user_id, string $file, string $name): void
    {
        $this->client->post('/upload_private_file', [
            'form_params' => compact('user_id', 'file', 'name')
        ]);
    }
}
