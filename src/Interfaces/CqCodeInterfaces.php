<?php

namespace Itwmw\GoCqHttp\Interfaces;

interface CqCodeInterfaces extends \Stringable
{
    public static function create(string $code): static|false;

    public function get(): string;
}
