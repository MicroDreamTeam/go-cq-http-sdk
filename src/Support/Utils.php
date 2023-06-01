<?php

namespace Itwmw\GoCqHttp\Support;

class Utils
{
    public static function value($value, ...$args)
    {
        return $value instanceof \Closure ? $value(...$args) : $value;
    }
}
