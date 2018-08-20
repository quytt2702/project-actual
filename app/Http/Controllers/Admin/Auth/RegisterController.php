<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Entities\Admin\Admin;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';
    protected $admin;

    public function __construct(Admin $admin)
    {
        $this->middleware('guest');

        $this->admin = $admin;
    }

    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255|unique:admin,username',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return NguoiDung::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:admin,email|max:255',
            'password' => 'required|confirmed|min:8|max:255',
            'password_confirmation' => 'required|min:8|max:255',
            'agree_terms' => 'required'
        ]);

        $nguoiDung = $this->nguoiDung->register($data);

        Auth::logout();

        return redirect()->route('admin.auth.login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
