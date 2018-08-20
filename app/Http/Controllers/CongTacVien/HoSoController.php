<?php

namespace App\Http\Controllers\CongTacVien;

use Auth;
use Uuid;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\SendMail;
use App\Entities\LogTaiKhoanNganHang;
use App\Repositories\Contracts\CongTacVienRepository;
use App\Validators\CongTacVien\HoSo\ChangePasswordValidator;
use App\Repositories\Contracts\LogTaiKhoanNganHangRepository;
use App\Validators\CongTacVien\HoSo\UpdateTaiKhoanNganHangValidator;

class HoSoController extends Controller
{
    protected $logTaiKhoanNganHang;
    protected $congTacVien;

    public function __construct(
        CongTacVienRepository $congTacVien,
        LogTaiKhoanNganHangRepository $logTaiKhoanNganHang
    ) {
        $this->congTacVien = $congTacVien;
        $this->logTaiKhoanNganHang = $logTaiKhoanNganHang;
    }

    public function index(Request $request)
    {
        return view('cong_tac_vien.ho_so.index');
    }

    public function nganHang(Request $request, UpdateTaiKhoanNganHangValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $user = Auth::guard('cong_tac_vien')->user();

        // Tìm kiếm thay đổi
        $thayDoi = "";
        if ($user->so_tai_khoan !== $data['so_tai_khoan']) {
            $thayDoi .= '"Số tài khoản",';
            $user->so_tai_khoan = $data['so_tai_khoan'];
        }
        if ($user->ten_chi_nhanh !== $data['ten_chi_nhanh']) {
            $thayDoi .= '"Tên chi nhánh",';
            $user->ten_chi_nhanh = $data['ten_chi_nhanh'];
        }
        if ($user->ten_chu_tai_khoan !== $data['ten_chu_tai_khoan']) {
            $thayDoi .= '"Tên chủ tài khoản",';
            $user->ten_chu_tai_khoan = $data['ten_chu_tai_khoan'];
        }

        $user->save();

        // Nếu không có thay đổi thì không làm gì cả, chỉ trả về tin nhắn thông báo
        if (empty($thayDoi)) {
            return return_message('toastr', 'error', 'Bạn chưa thay đổi bất cứ thông tin nào!');
        }

        $hash = Uuid::generate(4)->string;

        // Cập nhật tất cả các log tài khoản ngân hàng trước là block
        $this->logTaiKhoanNganHang->updateBeforeLog($user->email);

        // Tạo log tài khoản ngân hàng mới
        $this->logTaiKhoanNganHang->create([
            'email'             => $user->email,
            'so_tai_khoan'      => $data['so_tai_khoan'],
            'ten_chi_nhanh'     => $data['ten_chi_nhanh'],
            'hash'              => $hash,
            'ten_chu_tai_khoan' => $data['ten_chu_tai_khoan'],
            'quyen'             => LogTaiKhoanNganHang::QUYEN['CONG_TAC_VIEN'],
            'thay_doi'          => '[' . substr($thayDoi, 0, strlen($thayDoi) - 1) . ']',
        ]);

        // Chuẩn bị link để gửi mail
        $app_url = (env('APP_URL') === 'http://localhost') ? 'http://localhost:8000' : env('APP_URL');
        $info = [
            'link' => $app_url . '/cong-tac-vien/ngan-hang/' . $hash,
        ];

        SendMail::send($user->email, 'Thông báo thay đổi thông tin ngân hàng', 'email.thay_doi_tai_khoan_ngan_hang', $info);

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }

    public function uploadAvatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            try {
                $user = Auth::guard('cong_tac_vien')->user();
                $user->avatar = url('storage/' . $file->store('avatars'));
                $user->save();
            } catch (\Exception $ex) {
                \Log::error($ex->getTraceAsString());
            }
        }

        return redirect()->route('cong_tac_vien.ho_so.index');
    }

    public function changePassword(Request $request, ChangePasswordValidator $validator)
    {
        $user = Auth::guard('cong_tac_vien')->user();

        $data = $request->all();

        $validator->with($data)->passesOrFail();

        if (!Hash::check($request->current_password, $user->password)) {
            return return_error('Mật khẩu cũ không đúng');
        }

        $password = bcrypt($request->new_password);

        $this->congTacVien->update(compact('password'), $user->id);

        return return_message('toastr', 'success', trans('notification.add.success'), true, route('cong_tac_vien.ho_so.index'));
    }
}
