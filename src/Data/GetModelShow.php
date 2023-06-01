<?php

namespace Itwmw\GoCqHttp\Data;

class GetModelShow extends CreateData
{
    /**
     * @var array<array-key, array{
     *     model_show: string,
     *     need_pay: bool
     * }
     */
    public readonly array $variants;

    public function __construct(array $variants, ...$args)
    {
        $this->variants = $variants;
    }
}
