<?php

namespace App\Http\Controllers\CongTacVien\Auth;

use DB;
use Auth;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Jobs\SendMail;
use App\Entities\CongTacVien;
use App\Http\Controllers\CongTacVien\Controller;
use App\Repositories\Contracts\CongTacVienRepository;
use App\Repositories\Contracts\Admin\CaiDatNgonNguRepository;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';
    protected $congTacVien;
    protected $caiDatNgonNgu;

    public function __construct(CongTacVienRepository $congTacVien, CaiDatNgonNguRepository $caiDatNgonNgu)
    {
        // $this->middleware('guest');

        $this->congTacVien = $congTacVien;
        $this->caiDatNgonNgu = $caiDatNgonNgu;
    }

    public function showRegistrationForm(Request $request)
    {
        $caiDatNgonNgu = $this->caiDatNgonNgu->find(1);
        // Lưu lại cookie
        if ($request->has('ref')) {
            $cookie = cookie('ref', $request->ref, 86400);

            return redirect()->route('cong_tac_vien.auth.register')->withCookie($cookie);
        }

        return view('cong_tac_vien.auth.register', compact('caiDatNgonNgu'));
    }

    public function register(Request $request)
    {
        // Validate
        $data = $request->validate([
            'email'                 => 'required|unique:admin,email|max:255|email',
            'password'              => 'required|confirmed|min:8|max:255',
            'password_confirmation' => 'required|min:8|max:255',
            'agree_terms'           => 'required',
            'ho_va_ten'             => 'required',
            'so_dien_thoai'         => 'required',
        ]);

        // Kiểm tra không cho trùng số điện thoại
        $checkSoDienThoai = $this->congTacVien->findBySDTDaXacThuc($data['so_dien_thoai']);
        if (!empty($checkSoDienThoai)) {
            return validate_errors(['Số điện thoại này đã được sử dụng']);
        }

        // Nếu đăng kí thành công thì thêm href vào (nếu có)
        $hash_gioi_thieu = Cookie::get('ref');
        $nguoi_gioi_thieu = CongTacVien::where('txid', $hash_gioi_thieu)->first();
        if (!empty($nguoi_gioi_thieu)) {
            $data = array_merge($data, [
                'email_gioi_thieu' => $nguoi_gioi_thieu->email,
            ]);
        }

        // Lấy ip đăng ký
        $ip = ($request->ip() !== '127.0.0.1') ? $request->ip() : '14.167.100.190';
        $data = array_merge($data, [
            'ip_dang_ky' => $ip
        ]);

        // Thiếu logic tìm email có duy nhất trong các bảng khác
        // vì email nằm trong 3 bảng khác nhau
        $convert_email = convert_email($data['email']);
        $count_mail = DB::table('cong_tac_vien')->where('convert_email', $convert_email)->count();

        if ($count_mail > 0) {
            return redirect()->route('cong_tac_vien.auth.register');
        }

        if (empty($nguoi_gioi_thieu)) {
            for ($i = 0; $i < 10; $i++) {
                $randomUser = $this->congTacVien->randomCongTacVien($i);
                if (!empty($randomUser)) {
                    $data['email_gioi_thieu'] = $randomUser->email;
                    $randomUser->so_thanh_vien_da_gioi_thieu++;
                    $randomUser->save();
                    break;
                }
            }
        } else {
            $findEmail = $this->congTacVien->findByEmail($nguoi_gioi_thieu->email);
            if (!empty($findEmail)) {
                $findEmail->so_thanh_vien_da_gioi_thieu = $findEmail->so_thanh_vien_da_gioi_thieu + 1;
                $findEmail->save();
            }
        }

        $congTacVien = $this->congTacVien->register($data);

        SendMail::send($congTacVien->email, 'Xác thực tài khoản', view('email.xac_thuc', compact('congTacVien'))->render());

        Auth::logout();

        return view('layouts.info', [
            'title' => 'Thông báo', 'message' => 'Hãy kiểm tra mail để xác thực tài khoản của bạn', 'link' => route('cong_tac_vien.auth.login')
        ]);
    }

    protected function guard()
    {
        return Auth::guard('cong_tac_vien');
    }
}
