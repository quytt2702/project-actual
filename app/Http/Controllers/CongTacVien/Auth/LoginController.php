<?php

namespace App\Http\Controllers\CongTacVien\Auth;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

// use App\Services\SendMail;
use App\Jobs\SendMail;
use App\Entities\CongTacVien;
use App\Repositories\Contracts\Admin\CaiDatNgonNguRepository;

use App\Http\Controllers\CongTacVien\Controller;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';
    protected $caiDatNgonNgu;

    public function __construct(CaiDatNgonNguRepository $caiDatNgonNgu)
    {
        // $this->middleware('admin')->except('logout');
        $this->caiDatNgonNgu = $caiDatNgonNgu;
    }

    public function showLoginForm()
    {
        $caiDatNgonNgu = $this->caiDatNgonNgu->find(1);

        return view('cong_tac_vien.auth.login', compact('caiDatNgonNgu'));
    }

    protected function guard()
    {
        return Auth::guard('cong_tac_vien');
    }

    protected function authenticated(Request $request, $user)
    {
        // Chưa xác thực qua mail thì hiện thông báo
        if ($user->admin_kich_hoat === CongTacVien::ADMIN_KICH_HOAT['NO']) {
            Auth::guard('cong_tac_vien')->logout();
            return view('layouts.info', [
                'title' => 'Thông báo', 'message' => 'Vui lòng xác thực tài khoản qua mail', 'link' => route('cong_tac_vien.auth.login')
            ]);
        }

        // Chưa xác thực thành công thì chuyển về trang xác thực
        if ($user->is_kich_hoat !== CongTacVien::IS_KICH_HOAT['DONE']) {
            return redirect()->route('cong_tac_vien.xac_thuc.index');
        }

        SendMail::send($user->email, 'Thông báo đăng nhập', view('email.dang_nhap')->render());
        // SendMail::send($user->email, 'Thông báo đăng nhập', 'email.dang_nhap', null);

        return redirect()->route('cong_tac_vien.dashboard.index');
    }
}
