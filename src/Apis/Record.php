<?php

namespace Itwmw\GoCqHttp\Apis;

use JetBrains\PhpStorm\ExpectedValues;

class Record extends BaseApi
{
    /**
     * 获取语音
     *
     * @param string $file       收到的语音文件名（消息段的 file 参数）, 如 0B38145AA44505000B38145AA4450500.silk
     * @param string $out_format 转换到的格式, 目前支持 mp3、amr、wma、m4a、spx、ogg、wav、flac
     *
     * @return string 转换后的语音文件路径, 如 /cqhttp/data/record/0B38145AA44505000B38145AA4450500.mp3
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getRecord(
        string $file,
        #[ExpectedValues(values: ['mp3', 'amr', 'wma', 'm4a', 'spx', 'ogg', 'wav', 'flac'])]
        string $out_format
    ): string {
        return $this->client->get('/get_record', [
            'query' => compact('file', 'out_format')
        ])->getData()['file'];
    }

    /**
     * 检查是否可以发送语音
     *
     * @return bool
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function canSendRecord(): bool
    {
        return $this->client->get('/can_send_record')->getData()['yes'];
    }
}
