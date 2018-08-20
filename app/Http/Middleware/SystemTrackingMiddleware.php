<?php

namespace App\Http\Middleware;

use Auth;
use Route;
use Closure;

class SystemTrackingMiddleware
{
    protected $excepts = [
        'admin.auth.login',
    ];

    protected $routes = [
        'log-viewer',
    ];

    public function handle($request, Closure $next)
    {
        if (substr(Route::currentRouteName(), 0, 10) !== 'log-viewer') {
            return $next($request);
        }

        // Nếu trong excepts thì cho vào
        if (in_array(Route::currentRouteName(), $this->excepts)) {
            return $next($request);
        }

        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.auth.login');
        }

        return $next($request);
    }
}
