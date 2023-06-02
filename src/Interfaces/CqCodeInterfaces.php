<?php

namespace Itwmw\GoCqHttp\Interfaces;

use Stringable;

interface CqCodeInterfaces extends Stringable
{
    public static function create(string $code): static|false;

    public function get(): string;
}
