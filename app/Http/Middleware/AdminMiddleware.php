<?php

namespace App\Http\Middleware;

use Auth;
use Route;
use Closure;

class AdminMiddleware
{
    protected $excepts = [
        'admin.auth.login',
        // 'admin.forgot',
        // 'admin.forgot.change',
    ];

    public function handle($request, Closure $next)
    {
        // Nếu trong excepts thì cho vào
        if (in_array(Route::currentRouteName(), $this->excepts)) {
            return $next($request);
        }

        // Nếu không có quyền admin thì chuyển về trang login admin
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.auth.login');
        }

        session_start();
        $_SESSION['Admin'] = 'Admin';

        return $next($request);
    }
}
