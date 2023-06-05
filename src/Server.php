<?php

namespace Itwmw\GoCqHttp;

use Closure;
use InvalidArgumentException;
use Itwmw\GoCqHttp\Data\Post\BasePostMessage;
use Itwmw\GoCqHttp\Data\Post\PostMessageType;
use Itwmw\GoCqHttp\Support\Str;
use JetBrains\PhpStorm\ExpectedValues;

class Server
{
    protected array $handlers = [];

    public function __construct()
    {
    }

    public function addHandler(callable $handler): static
    {
        $this->handlers[] = $handler;
        return $this;
    }

    /**
     * @template T of BasePostMessage
     *
     * @param class-string<T> $event
     * @param callable|class-string $handler
     * @return $this
     */
    public function addEventListener(
        #[ExpectedValues(valuesFromClass: PostMessageType::class)]
        string $event,
        callable|string $handler
    ): static {
        $handler = $this->makeClosure($handler);

        $this->addHandler(
            function (BasePostMessage $message, Closure $next) use ($event, $handler): mixed {
                return $message instanceof $event ? $handler($message, $next) : $next($message);
            }
        );

        return $this;
    }

    protected function makeClosure(callable|string $handler): callable
    {
        if (is_callable($handler)) {
            return $handler;
        }

        if (class_exists($handler) && method_exists($handler, '__invoke')) {
            return fn (): mixed => (new $handler())(...func_get_args());
        }

        throw new InvalidArgumentException(sprintf('Invalid handler: %s.', $handler));
    }

    protected function getPostMessage(): BasePostMessage|false
    {
        $input = file_get_contents('php://input');
        $data  = json_decode($input, true);
        if (JSON_ERROR_NONE !== json_last_error()) {
            return false;
        }

        if (!isset($data['post_type'])) {
            return false;
        }

        $postType = $data['post_type'];
        if ('message_sent' === $postType) {
            $postType = 'message';
        }

        $subType = match ($postType) {
            'message'    => 'message_type',
            'request'    => 'request_type',
            'notice'     => 'notice_type',
            'meta_event' => 'meta_event_type',
            default      => null
        };

        $class = '\Itwmw\GoCqHttp\Data\Post\\' . Str::studly($postType) . '\\' . Str::studly($data[$subType]) . Str::studly($postType);
        if (!class_exists($class)) {
            return false;
        }

        return $class::create($data);
    }

    public function handle(): string
    {
        $message = $this->getPostMessage();
        if (!$message) {
            return '';
        }
        $handler = new Support\PostMessageHandler($this->handlers);
        return $handler->handle($message);
    }
}
