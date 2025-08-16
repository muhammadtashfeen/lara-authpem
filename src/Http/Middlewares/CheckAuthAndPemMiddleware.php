<?php

/**
 * @author Muhammad Tashfeen
 */

namespace MuhammadTashfeen\LaraAuthpem\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;

class CheckAuthAndPemMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        dump("CheckAuthAndPemMiddleware::handle");
        return $next($request);
    }
}
