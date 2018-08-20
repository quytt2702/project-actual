<?php

namespace App\Http\Controllers\CongTacVien\Auth;

use DB;
use Uuid;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\SendMail;
use App\Entities\CongTacVien;
use App\Repositories\Contracts\CongTacVienRepository;

class ForgotPasswordController extends Controller
{
    protected $congTacVien;

    public function __construct(CongTacVienRepository $congTacVien)
    {
        $this->congTacVien = $congTacVien;
    }

    public function forgot(Request $request)
    {
        DB::beginTransaction();

        try {
            $congTacVien = $this->congTacVien->findByEmail($request->email_recover);

            if (empty($congTacVien)) {
                return view('layouts.info', [
                    'title' => 'Thông báo', 'message' => 'Không tìm thấy email', 'link' => route('cong_tac_vien.auth.login')
                ]);
            } else {
                $txid = Uuid::generate(4)->string;
                $congTacVien->txid_quen_mat_khau = $txid;
                $congTacVien->trang_thai_quen_mat_khau = CongTacVien::TRANG_THAI_QUEN_MAT_KHAU['YES'];
                $congTacVien->ngay_quen_mat_khau = now();
                $congTacVien->save();

                $info = [
                    'email' => $congTacVien->email ,
                    'link' => route('cong_tac_vien.auth.recover_password', ['token' => $txid]),
                ];

                SendMail::send($congTacVien->email, 'Lấy lại mật khẩu', 'email.quen_mat_khau', $info);
            }

            DB::commit();

            return view('layouts.info', [
                    'title' => 'Thông báo', 'message' => 'Vui lòng kiểm tra mail để lấy lại mật khẩu', 'link' => route('cong_tac_vien.auth.login')
            ]);
        } catch (Exception $ex) {
            \Log::error($ex->getMessage());

            DB::rollback();
        }
    }

    public function recover(Request $request)
    {
        $token = $request->token;

        return view('cong_tac_vien.auth.recover_password', compact('token'));
    }

    public function update(Request $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->all();

            $txid = $data['txid'];
            $congTacVien = $this->congTacVien->findByTxidQuenMatKhau($txid);

            if (empty($congTacVien) || $congTacVien->trang_thai_quen_mat_khau !== CongTacVien::TRANG_THAI_QUEN_MAT_KHAU['YES']) {
                return view('layouts.info', [
                    'title' => 'Thông báo', 'message' => 'Lỗi không xác định', 'link' => route('cong_tac_vien.auth.login')
                ]);
            } elseif (strtotime($congTacVien->ngay_quen_mat_khau) + 86400000 < strtotime(date("Y-m-d H:i:s"))) {
                return view('layouts.info', [
                    'title' => 'Thông báo', 'message' => 'Link lấy lại mật khẩu của bạn đã hết hạn', 'link' => route('cong_tac_vien.auth.login')
                ]);
            } else {
                $congTacVien->password = bcrypt($data['password']);
                $congTacVien->txid_quen_mat_khau = null;
                $congTacVien->ngay_quen_mat_khau = null;
                $congTacVien->trang_thai_quen_mat_khau = null;
                $congTacVien->save();

                DB::commit();

                return view('layouts.info', [
                    'title' => 'Thông báo', 'message' => 'Đã đổi mật khẩu của bạn thành công', 'link' => route('cong_tac_vien.auth.login')
                ]);
            }
        } catch (Exception $ex) {
            \Log::error($ex->getMessage());

            DB::rollback();
        }
    }
}
