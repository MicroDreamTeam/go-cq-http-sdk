<?php

namespace Itwmw\GoCqHttp\Data;

use Itwmw\GoCqHttp\Interfaces\Arrayable;

class CreateData implements \Stringable, Arrayable
{
    public static function create(array $data)
    {
        return new static(...$data);
    }

    public function toArray(): array
    {
        $array = (array)$this;
        foreach ($array as $key => $value) {
            if ($value instanceof Arrayable) {
                $array[$key] = $value->toArray();
            }
        }
        return $array;
    }

    public function __toString(): string
    {
        return json_encode($this->toArray());
    }
}
