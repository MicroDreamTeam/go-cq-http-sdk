<?php

namespace Itwmw\GoCqHttp\CqCode;

/**
 * 一种xml的图片消息（装逼大图）
 *
 * xml 接口的消息都存在风控风险, 请自行兼容发送失败后的处理 ( 可以失败后走普通图片模式 )
 */
class CardImage extends BaseCqCode
{
    public static string $_type = 'cardimage';

    protected array $sendFields = [
        'file',
        'minwidth',
        'minheight',
        'maxwidth',
        'maxheight',
        'source',
        'icon',
    ];

    /**
     * @param string $file      图片文件名, 支持的文件类型有: jpg, jpeg, png, gif, bmp, webp, apng, rle, ico, tif, tiff, svg, svgz, jfif, pjpeg, pjp <span style="color:green">发</span>
     * @param int    $minwidth  默认不填为400, 最小width <span style="color:green">发</span>
     * @param int    $minheight 默认不填为400, 最小height <span style="color:green">发</span>
     * @param int    $maxwidth  默认不填为500, 最大width <span style="color:green">发</span>
     * @param int    $maxheight 默认不填为1000, 最大height <span style="color:green">发</span>
     * @param string $source    分享来源的名称, 可以留空 <span style="color:green">发</span>
     * @param string $icon      分享来源的icon图标url, 可以留空 <span style="color:green">发</span>
     */
    public function __construct(
        public string $file,
        public int $minwidth = 400,
        public int $minheight = 400,
        public int $maxwidth = 500,
        public int $maxheight = 1000,
        public string $source = '',
        public string $icon = '',
        ...$args
    ) {
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
