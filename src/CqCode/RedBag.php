<?php

namespace Itwmw\GoCqHttp\CqCode;

/**
 * 红包
 */
class RedBag extends BaseCqCode
{
    public static string $_type = 'redbag';

    protected array $sendFields = [];

    /**
     * @param string $title 祝福语/口令 <span style="color:green">收</span>
     */
    public function __construct(
        public string $title,
        ...$args
    ) {
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
