<?php

/**
 * @noinspection PhpUndefinedClassInspection
 * @noinspection PhpUndefinedFieldInspection
 * @noinspection PhpUndefinedNamespaceInspection
 */

namespace Itwmw\GoCqHttp\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Itwmw\GoCqHttp\Server;

class MessageProvider extends ServiceProvider
{
    public function boot(): void
    {
        Server::setMessageProvider(function () {
            return $this->app->get(Request::class)->getContent();
        });
    }
}
