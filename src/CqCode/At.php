<?php

namespace Itwmw\GoCqHttp\CqCode;

/**
 * @某人
 */
class At extends BaseCqCode
{
    public static string $_type = 'at';

    protected array $sendFields = [
        'qq',
        'name'
    ];

    /**
     * @param int|'all'    $qq   QQ 号、all	@的 QQ 号, all 表示全体成员 <span style="color:green">收 + 发</span>
     * @param string $name 当在群中找不到此QQ号的名称时才会生效 <span style="color:green">发</span>
     */
    public function __construct(
        public int|string $qq,
        public string $name = '',
        ...$args
    ) {
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
