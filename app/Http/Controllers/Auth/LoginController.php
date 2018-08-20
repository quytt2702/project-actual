<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Services\SendMail;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(Request $request)
    {
        return view('auth.nguoi_dung.login');
    }

    protected function authenticated(Request $request, $user)
    {
        // SendMail::send($user->email,'Thông báo đăng nhập', 'email.dang_nhap', null);

        return redirect()->route('index');
    }
}
