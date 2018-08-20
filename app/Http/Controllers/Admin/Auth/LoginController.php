<?php

namespace App\Http\Controllers\Admin\Auth;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Services\SendMail;
use App\Entities\Admin\Admin;
use App\Http\Controllers\Admin\Controller;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    protected function authenticated(Request $request, $user)
    {
        // Kiểm tra Admin đó có bị block hay delete không
        if ($user->is_block === Admin::IS_BLOCK['YES'] || $user->is_delete === Admin::IS_DELETE['YES']) {
            Auth::guard('admin')->logout();
            return validate_errors(['Tài khoản của bạn không thể đăng nhập hệ thống']);
        }
        // Kết thúc kiểm tra Admin đó có bị block hay không

        // Thêm session Admin để dùng ckfinder
        session_start();
        $_SESSION['Admin'] = 'Admin';
        // Kết thúc thêm session Admin để dùng ckfinder

        return redirect()->route('admin.xac_thuc.index');
    }

    public function logout(Request $request)
    {
        $_SESSION['Admin'] = null;

        $this->guard()->logout();

        return redirect()->route('admin.auth.login');
    }
}
