<?php

namespace Itwmw\GoCqHttp\Support;

class Str
{
    protected static array $studlyCache = [];

    public static function studly($value)
    {
        $key = $value;

        if (isset(static::$studlyCache[$key])) {
            return static::$studlyCache[$key];
        }

        $words = explode(' ', str_replace(['-', '_'], ' ', $value));

        $studlyWords = array_map(fn ($word) => static::ucfirst($word), $words);

        return static::$studlyCache[$key] = implode($studlyWords);
    }

    public static function ucfirst($string): string
    {
        return static::upper(static::substr($string, 0, 1)) . static::substr($string, 1);
    }

    public static function upper($value): string
    {
        return mb_strtoupper($value, 'UTF-8');
    }

    public static function substr($string, $start, $length = null, $encoding = 'UTF-8'): string
    {
        return mb_substr($string, $start, $length, $encoding);
    }
}
