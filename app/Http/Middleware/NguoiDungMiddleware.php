<?php

namespace App\Http\Middleware;

use Auth;
use Route;
use Closure;

use App\Entities\NguoiDung;

class NguoiDungMiddleware
{
    protected $excepts = [
        'index',
        'auth.login',
        'xac_thuc.nguoi_dung',
        'xac_thuc.admin',
        // 'admin.forgot',
        // 'admin.forgot.change',
    ];

    public function handle($request, Closure $next)
    {
        // Nếu trong excepts thì cho vào
        if (in_array(Route::currentRouteName(), $this->excepts)) {
            return $next($request);
        }

        $nguoiDung = $request->user();
        if ($nguoiDung->is_kich_hoat !== NguoiDung::IS_KICH_HOAT['DONE']) {
            return redirect()->route('xac_thuc.nguoi_dung');
        }
        if ($nguoiDung->is_admin_kich_hoat !== NguoiDung::IS_ADMIN_KICH_HOAT['DONE']) {
            return redirect()->route('xac_thuc.admin');
        }

        // if ($user)
        // Nếu không có quyền admin thì chuyển về trang login admin
        // if (!Auth::guard('admin')->check()) {
        //     return redirect()->route('admin.auth.login');
        // }

        return $next($request);
    }
}
