<?php

namespace Itwmw\GoCqHttp\CqCode;

use Itwmw\GoCqHttp\Interfaces\CqCodeInterfaces;
use Itwmw\GoCqHttp\Support\Utils;

abstract class BaseCqCode implements CqCodeInterfaces
{
    public static string $_type;

    protected array $sendFields;

    public static function create(string $code): static|false
    {
        $data = Utils::parseCqCode($code, static::$_type);
        if (empty($data)) {
            return false;
        }
        return new static(...$data);
    }

    public function get(): string
    {
        $data = [];
        foreach ($this->sendFields as $field) {
            $data[$field] = $this->$field;
        }
        return $this->buildCode($data);
    }

    protected function buildCode($data): string
    {
        $data = array_filter($data, function ($value) {
            return '' !== $value && !is_null($value);
        });
        $str = '';
        foreach ($data as $key => $value) {
            $value = $this->escape($value);
            $str .= ",$key=$value";
        }
        return '[CQ:' . static::$_type . $str . ']';
    }

    protected function escape(string $str): string
    {
        return str_replace(['&', '[', ']', ','], ['&amp;', '&#91;', '&#93;', '&#44;'], $str);
    }
}
