<?php

namespace Itwmw\GoCqHttp\Data;

use ArrayAccess;
use Itwmw\GoCqHttp\Interfaces\Arrayable;
use Stringable;

class CreateData implements Stringable, Arrayable, ArrayAccess
{
    public static function create(array $data): static
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

    public function offsetExists(mixed $offset): bool
    {
        return property_exists($this, $offset);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->$offset;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->$offset = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->$offset);
    }
}
