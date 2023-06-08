<?php

namespace Itwmw\GoCqHttp\Support;

use Closure;

class Handler
{
    /**
     * @param array<int, Closure> $handlers
     */
    public function __construct(
        protected array $handlers
    ) {
    }

    protected function carry(): Closure
    {
        return function ($stack, $pipe) {
            return function ($data) use ($stack, $pipe) {
                return $pipe($data, $stack);
            };
        };
    }

    protected function pipes(): array
    {
        return array_map(function ($callback) {
            return function ($data, $next) use ($callback) {
                return $callback($data, $next);
            };
        }, $this->handlers);
    }

    public function handle(mixed $data)
    {
        $pipeline = array_reduce(
            array_reverse($this->pipes()),
            $this->carry(),
            fn (mixed $data) => $data
        );

        return $pipeline($data);
    }
}
