<?php

/**
 * @author Muhammad Tashfeen
 */

namespace MuhammadTashfeen\LaraAuthpem\Providers;

use Illuminate\Support\ServiceProvider;
use MuhammadTashfeen\LaraAuthpem\Http\Middlewares\CheckAuthAndPemMiddleware;

final class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app['router']->aliasMiddleware('mt.authpem', CheckAuthAndPemMiddleware::class);
    }
}
