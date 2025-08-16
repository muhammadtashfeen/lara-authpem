<?php
/**
 * @author Muhammad Tashfeen
 * @copyright 2025 GAIA AG, Hamburg
 * @package pp
 *
 * Created using PhpStorm at 16.08.25 11:03
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
