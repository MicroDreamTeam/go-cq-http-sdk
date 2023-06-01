<?php

namespace Itwmw\GoCqHttp\Apis;

use Itwmw\GoCqHttp\Data\GetImage;

class Image extends BaseApi
{
    /**
     * 获取图片信息
     *
     * @param string $file 图片缓存文件名
     *
     * @return GetImage
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getImage(string $file): GetImage
    {
        return $this->client->get('/get_image', [
            'query' => compact('file')
        ])->getData();
    }

    /**
     * 检查是否可以发送图片
     *
     * @return bool
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function canSendImage(): bool
    {
        return $this->client->get('/can_send_image')->getData()['yes'];
    }

    /**
     * 图片 OCR
     *
     * <b>目前图片OCR接口仅支持接受的图片<b>
     *
     * @param string $image
     *
     * @return array{
     *     language: string,
     *     texts: array<int, array{
     *          text: string,
     *          confidence: float,
     *          coordinates: array<int, array{
     *               x: int,
     *               y: int
     *         }>
     *     }>
     * }
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function ocrImage(string $image): array
    {
        return $this->client->post('/ocr_image', [
            'form_params' => compact('image')
        ])->getData();
    }
}
