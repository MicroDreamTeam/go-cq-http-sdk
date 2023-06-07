<?php

namespace Itwmw\GoCqHttp;

use Closure;
use InvalidArgumentException;
use Itwmw\GoCqHttp\Data\Post\BasePostMessage;
use Itwmw\GoCqHttp\Data\Struct\Enum\PostMessageType;
use Itwmw\GoCqHttp\Data\Struct\Enum\PostMetaEventType;
use Itwmw\GoCqHttp\Data\Struct\Enum\PostNoticeType;
use Itwmw\GoCqHttp\Data\Struct\Enum\PostRequestType;
use Itwmw\GoCqHttp\Data\Struct\Enum\PostType;
use Itwmw\GoCqHttp\Support\Str;
use JetBrains\PhpStorm\ExpectedValues;

class Server
{
    protected array $handlers = [];

    public function __construct()
    {
    }

    /**
     * @param callable|class-string $handler
     * @return $this
     */
    public function addHandler(callable|string $handler): static
    {
        $this->handlers[] = $this->makeClosure($handler);
        return $this;
    }

    /**
     * @param string $type
     * @param callable|class-string $handler
     * @return $this
     */
    public function addMessageListener(
        #[ExpectedValues(valuesFromClass: PostMessageType::class)]
        string $type,
        callable|string $handler
    ): static {
        $handler = $this->makeClosure($handler);

        $this->addHandler(
            function (BasePostMessage $message, Closure $next) use ($type, $handler): mixed {
                return PostType::MESSAGE === $message->post_type && $message->message_type === $type ? $handler($message, $next) : $next($message);
            }
        );

        return $this;
    }

    /**
     * @param string $type
     * @param callable|class-string $handler
     * @return $this
     */
    public function addNoticeListener(
        #[ExpectedValues(valuesFromClass: PostNoticeType::class)]
        string $type,
        callable|string $handler
    ): static {
        $handler = $this->makeClosure($handler);

        $this->addHandler(
            function (BasePostMessage $message, Closure $next) use ($type, $handler): mixed {
                return PostType::NOTICE === $message->post_type && $message->notice_type === $type ? $handler($message, $next) : $next($message);
            }
        );

        return $this;
    }

    /**
     * @param string $type
     * @param callable|class-string $handler
     * @return $this
     */
    public function addRequestListener(
        #[ExpectedValues(valuesFromClass: PostRequestType::class)]
        string $type,
        callable|string $handler
    ): static {
        $handler = $this->makeClosure($handler);

        $this->addHandler(
            function (BasePostMessage $message, Closure $next) use ($type, $handler): mixed {
                return PostType::REQUEST === $message->post_type && $message->request_type === $type ? $handler($message, $next) : $next($message);
            }
        );

        return $this;
    }

    /**
     * @param string $type
     * @param callable|class-string $handler
     * @return $this
     */
    public function addMetaEventListener(
        #[ExpectedValues(valuesFromClass: PostMetaEventType::class)]
        string $type,
        callable|string $handler
    ): static {
        $handler = $this->makeClosure($handler);

        $this->addHandler(
            function (BasePostMessage $message, Closure $next) use ($type, $handler): mixed {
                return PostType::META_EVENT === $message->post_type && $message->meta_event_type === $type ? $handler($message, $next) : $next($message);
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
