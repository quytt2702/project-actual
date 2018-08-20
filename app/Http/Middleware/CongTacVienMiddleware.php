<?php

namespace App\Http\Middleware;

use Auth;
use Route;
use Closure;

use App\Entities\CongTacVien;

class CongTacVienMiddleware
{
    protected $excepts = [
        'cong_tac_vien.xac_thuc.index',
        'cong_tac_vien.xac_thuc.xac_thuc',
        // 'cong-tac-vien.ngan-hang.update',
        'cong_tac_vien.xac_thuc.admin_xac_thuc',
    ];

    protected $is_dai_ly = [
        'cong_tac_vien.toi_gioi_thieu.index',
    ];

    public function handle($request, Closure $next)
    {
        $congTacVien = Auth::guard('cong_tac_vien')->user();

        // Nếu trong excepts thì cho vào
        if (in_array(Route::currentRouteName(), $this->excepts) || substr(Route::currentRouteName(), 0, 19) === 'cong_tac_vien.auth.') {
            return $next($request);
        }

        // Chưa xác thực thành công thì chuyển về trang xác thực
        if (!empty($congTacVien)) {
            if ($congTacVien->is_kich_hoat !== CongTacVien::IS_KICH_HOAT['DONE'] || $congTacVien->admin_kich_hoat === CongTacVien::ADMIN_KICH_HOAT['NO']) {
                return redirect()->route('cong_tac_vien.xac_thuc.index');
            }
        } else {
            Auth::guard('cong_tac_vien')->logout();
            return redirect()->route('cong_tac_vien.auth.login');
        }

        // Nếu là đại lý thì mới vào được những route cho phép
        if (in_array(Route::currentRouteName(), $this->is_dai_ly) && $congTacVien->is_dai_ly !== CongTacVien::IS_DAI_LY['YES']) {
            return redirect()->route('cong_tac_vien.dashboard.index');
        }

        if (Route::currentRouteName() === 'cong_tac_vien.index') {
            return redirect()->route('cong_tac_vien.ho_so.index');
        }

        return $next($request);
    }
}
