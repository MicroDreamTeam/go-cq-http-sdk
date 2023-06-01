<?php

namespace Itwmw\GoCqHttp\Data;

use Itwmw\GoCqHttp\Interfaces\Arrayable;
use Itwmw\GoCqHttp\Support\Utils;

/**
 * @template TKey of array-key
 * @template TValue
 *
 * @implements \ArrayAccess<TKey, TValue>
 */
final class ArrayData implements \ArrayAccess
{
    /**
     * @var array<TKey, TValue>
     */
    protected array $data = [];

    /**
     * @param iterable<TKey, TValue> $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @template TGetDefault
     *
     * @param  TKey  $key
     * @param  mixed|TGetDefault|(\Closure(): TGetDefault)  $default
     * @return TValue|TGetDefault
     */
    public function get($key, mixed $default = null)
    {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }

        return Utils::value($default);
    }

    /**
     * @param  TKey|array<array-key, TKey>  $key
     * @return bool
     */
    public function has(mixed $key): bool
    {
        $keys = is_array($key) ? $key : func_get_args();

        foreach ($keys as $value) {
            if (! array_key_exists($value, $this->data)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param TKey $offset
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return isset($this->data[$offset]);
    }

    /**
     * @param  TKey  $offset
     * @return TValue
     */
    public function offsetGet($offset): mixed
    {
        return $this->data[$offset];
    }

    /**
     * @param TKey $offset
     * @param TValue $value
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        $this->data[$offset] = $value;
    }

    /**
     * @param TKey $offset
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->data[$offset]);
    }

    public function toArray(): array
    {
        $data = [];
        foreach ($this->data as $key => $value) {
            if ($value instanceof Arrayable) {
                $data[$key] = $value->toArray();
            } else {
                $data[$key] = $value;
            }
        }
        return $data;
    }

    /**
     * @return array<TKey, TValue>
     */
    public function all(): array
    {
        return $this->data;
    }
}
