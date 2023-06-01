<?php

namespace Itwmw\GoCqHttp\Apis;

use Itwmw\GoCqHttp\Data\GetStatus;
use Itwmw\GoCqHttp\Data\GetVersionInfo;

class Cq extends BaseApi
{
    /**
     * 获取 Cookies
     *
     * @deprecated 该 API 暂未被 go-cqhttp 支持, 您可以提交 pr 以使该 API 被支持 提交 pr
     *
     * @param string $domain 需要获取 cookies 的域名
     *
     * @return string Cookie
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getCookies(string $domain): string
    {
        return $this->client->post('/get_cookies', [
            'form_params' => compact('domain')
        ])->getData()['cookies'];
    }

    /**
     * 获取 CSRF Token
     *
     * @deprecated 该 API 暂未被 go-cqhttp 支持, 您可以提交 pr 以使该 API 被支持 提交 pr
     *
     * @return int CSRF Token
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getCsrfToken(): int
    {
        return $this->client->post('/get_csrf_token')->getData()['token'];
    }

    /**
     * 获取 QQ 相关接口凭证
     *
     * @deprecated 该 API 暂未被 go-cqhttp 支持, 您可以提交 pr 以使该 API 被支持 提交 pr
     *
     * @param string $domain 需要获取 cookies 的域名
     *
     * @return array{
     *     cookies: string,
     *     csrf_token: int
     * }
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getCredentials(string $domain): array
    {
        return $this->client->post('/get_credentials', [
            'form_params' => compact('domain')
        ])->getData();
    }

    /**
     * 获取版本信息
     *
     * @return GetVersionInfo
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getVersionInfo(): GetVersionInfo
    {
        return $this->client->post('/get_version_info')->getData();
    }

    /**
     * 获取状态
     *
     * @return GetStatus
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getStatus(): GetStatus
    {
        return $this->client->post('/get_status')->getData();
    }

    /**
     * 清理缓存
     *
     * @deprecated 该 API 暂未被 go-cqhttp 支持, 您可以提交 pr 以使该 API 被支持 提交 pr
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function cleanCache(): void
    {
        $this->client->post('/clean_cache');
    }

    /**
     * 重载事件过滤器
     *
     * @param string $file 事件过滤器文件
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function reloadEventFilter(string $file): void
    {
        $this->client->post('/reload_event_filter', [
            'form_params' => compact('file')
        ]);
    }

    /**
     * 下载文件到缓存目录
     *
     * 通过这个API下载的文件能直接放入CQ码作为图片或语音发送,调用后会阻塞直到下载完成后才会返回数据，请注意下载大文件时的超时
     *
     * @param string       $url          下载地址
     * @param int          $thread_count 下载线程数
     * @param string|array $headers      自定义请求头,[\r\n] 为换行符, 使用http请求时请注意编码
     *
     * @return string 下载文件的绝对路径
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function downloadFile(string $url, int $thread_count = 1, string|array $headers = []): string
    {
        return $this->client->post('/download_file', [
            'form_params' => compact('url', 'thread_count', 'headers')
        ])->getData()['file'];
    }

    /**
     * 检查链接安全性
     *
     * @param string $url 需要检查的链接
     *
     * @return int 安全等级, 1: 安全 2: 未知 3: 危险
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function checkUrlSafely(string $url): int
    {
        return $this->client->post('/check_url_safely', [
            'form_params' => compact('url')
        ])->getData()['level'];
    }

    /**
     * 获取中文分词 ( 隐藏 API )
     *
     * @deprecated 隐藏 API 是不建议一般用户使用的, 它们只应该在 OneBot 实现内部或由 SDK 和框架使用, 因为不正确的使用可能造成程序运行不正常。
     *
     * @param string $content 内容
     *
     * @return array 词组
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getWordSlices(string $content): array
    {
        return $this->client->post('/.get_word_slices', [
            'form_params' => compact('content')
        ])->getData()['slices'];
    }

    /**
     * 对事件执行快速操作 ( 隐藏 API )
     *
     * @deprecated 隐藏 API 是不建议一般用户使用的, 它们只应该在 OneBot 实现内部或由 SDK 和框架使用, 因为不正确的使用可能造成程序运行不正常。
     *
     * @param array $context   事件数据对象, 可做精简, 如去掉 message 等无用字段
     * @param array $operation 快速操作对象, 例如 {"ban": true, "reply": "请不要说脏话"}
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function handleQuickOperation(array $context, array $operation): void
    {
        $this->client->post('/.handle_quick_operation', [
            'form_params' => compact('context', 'operation')
        ]);
    }
}
