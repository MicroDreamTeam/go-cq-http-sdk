<?php

namespace Itwmw\GoCqHttp\CqCode;

class Xml extends BaseCqCode
{
    public static string $_type = 'xml';

    protected array $sendFields = [
        'data',
        'resid'
    ];

    /**
     * @param string $data xml内容, xml中的value部分, 记得实体化处理 <span style="color:green">收 + 发</span>
     * @param int $resid 可能为空, 或空字符串 <span style="color:green">收 + 发</span>
     */
    public function __construct(
        public string $data,
        public int $resid = 0,
        ...$args
    ) {
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
