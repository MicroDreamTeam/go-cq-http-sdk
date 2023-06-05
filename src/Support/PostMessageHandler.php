<?php

namespace Itwmw\GoCqHttp\Support;

use Closure;
use Itwmw\GoCqHttp\Data\Post\BasePostMessage;

class PostMessageHandler
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

    public function handle(BasePostMessage $message)
    {
        $pipeline = array_reduce(
            array_reverse($this->pipes()),
            $this->carry(),
            fn (BasePostMessage $message) => $message
        );

        return $pipeline($message);
    }
}
