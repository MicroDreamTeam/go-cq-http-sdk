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

    /**
     * @param array $data
     * @param class-string<CreateData> $class_name
     * @return ArrayData
     */
    protected function createArrayData(array $data, string $class_name): ArrayData
    {
        $data = array_map(function ($item) use ($class_name) {
            return $class_name::create($item);
        }, $data);

        return new ArrayData($data);
    }

    public function __toString(): string
    {
        return json_encode($this->toArray());
    }
}
