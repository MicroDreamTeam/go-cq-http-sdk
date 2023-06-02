<?php

namespace Itwmw\GoCqHttp\Data\Post\Notice;

use JetBrains\PhpStorm\ExpectedValues;

class BaseSubNotice extends BaseNotice
{
    /** @var string 提示类型 */
    #[ExpectedValues(values: ['poke', 'lucky_king', 'honor', 'title'])]
    public string $sub_type;
}
