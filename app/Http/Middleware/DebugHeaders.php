<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DebugHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $start = microtime(true);
        $memory = memory_get_usage();

        $response = $next($request);

        $time = microtime(true) - $start;
        $memory = memory_get_usage() - $memory;

        $response->header('X-Debug-Time', round($time * 1000, 2) . ' ms');
        $response->header('X-Debug-Memory', round($memory / 1024, 2) . ' KB');

        return $response;
    }
}
