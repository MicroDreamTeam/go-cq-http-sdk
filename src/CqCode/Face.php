<?php

namespace Itwmw\GoCqHttp\CqCode;

/**
 * QQ 表情
 */
class Face extends BaseCqCode
{
    public static string $_type = 'face';

    protected array $sendFields = [
        'id'
    ];

    /**
     * @param int $id QQ 表情 ID <span style="color:green">收 + 发</span>
     */
    public function __construct(
        public int $id,
        ...$args
    ) {
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
