<?php

namespace Itwmw\GoCqHttp\Support;

class Utils
{
    public static function value($value, ...$args)
    {
        return $value instanceof \Closure ? $value(...$args) : $value;
    }

    public static function parseCqCode(string $code, ?string $type = null): array
    {
        $code = trim($code);
        if (!is_null($type)) {
            if (!str_starts_with($code, "[CQ:$type,")) {
                return [];
            }
            $code = substr($code, 5 + strlen($type), -1);
        } else {
            $code = substr($code, 4, -1);
        }

        $code = explode(',', $code);
        if (empty($code)) {
            return [];
        }
        $data         = [];
        $data['type'] = $type ?? array_shift($code);
        foreach ($code as $item) {
            $item           = explode('=', $item, 2);
            $data[$item[0]] = $item[1];
        }
        return $data;
    }
}
