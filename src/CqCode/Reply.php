<?php

namespace Itwmw\GoCqHttp\CqCode;

/**
 * 回复
 */
class Reply extends BaseCqCode
{
    public static string $_type = 'reply';

    protected array $sendFields = [
        'id',
        'text',
        'qq',
        'time',
        'seq'
    ];

    /**
     * @param int         $id 回复时所引用的消息id, 必须为本群消息. <span style="color:green">收 + 发</span>
     * @param string|null $text 自定义回复的信息 <span style="color:green">收 + 发</span>
     * @param int|null    $qq 自定义回复时的自定义QQ, 如果使用自定义信息必须指定. <span style="color:green">收 + 发</span>
     * @param int|null    $time 自定义回复时的时间, 格式为Unix时间 <span style="color:green">收 + 发</span>
     * @param int|null    $seq 起始消息序号, 可通过 get_msg 获得 <span style="color:green">收 + 发</span>
     */
    public function __construct(
        public int $id,
        public ?string $text = '',
        public ?int $qq = null,
        public ?int $time = null,
        public ?int $seq = null,
        ...$args
    ) {
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
