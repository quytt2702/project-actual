<?php

namespace App\Http\Controllers\CongTacVien;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entities\CongTacVien;
use App\Repositories\Contracts\NganHangRepository;
use App\Repositories\Contracts\TinhThanhRepository;
use App\Repositories\Contracts\CongTacVienRepository;
use App\Validators\CongTacVien\XacThuc\StoreCongTacVienValidator;

class XacThucController extends Controller
{
    protected $nganHang;
    protected $tinhThanh;
    protected $congTacVien;

    public function __construct(
        NganHangRepository $nganHang,
        TinhThanhRepository $tinhThanh,
        CongTacVienRepository $congTacVien
    ) {
        $this->nganHang     = $nganHang;
        $this->tinhThanh    = $tinhThanh;
        $this->congTacVien  = $congTacVien;
    }

    public function index(Request $request)
    {
        $user = Auth::guard('cong_tac_vien')->user();

        if (empty($user)) {
            return view('layouts.info', [
                'title' => 'Thông báo', 'message' => 'Vui lòng đăng nhập', 'link' => route('cong_tac_vien.auth.login')
            ]);
        }

        if ($user->admin_kich_hoat === CongTacVien::ADMIN_KICH_HOAT['NO']) {
            return view('layouts.info', [
                'title' => 'Thông báo', 'message' => 'Vui lòng xác thực tài khoản qua mail', 'link' => route('cong_tac_vien.auth.login')
            ]);
        }

        if ($user->is_kich_hoat === CongTacVien::IS_KICH_HOAT['DONE']) {
            return redirect()->route('cong_tac_vien.ho_so.index');
        }

        if ($user->is_kich_hoat === CongTacVien::IS_KICH_HOAT['PENDING']) {
            return view('layouts.info', [
                'title' => 'Thông báo', 'message' => 'Hãy đợi admin duyệt', 'link' => route('cong_tac_vien.auth.login')
            ]);
        }

        $nganHang   = $this->nganHang->all();
        $tinhThanh  = $this->tinhThanh->all();

        return view('cong_tac_vien.xac_thuc.cong_tac_vien', compact('nganHang', 'tinhThanh'));
    }

    public function xacThuc(Request $request, StoreCongTacVienValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Chuyển sdt về kiểu thường
        if (substr($data['so_dien_thoai'], 0, 2) == '+8') {
            $data['so_dien_thoai'] = '0' . substr($data['so_dien_thoai'], 3);
        }
        // Kết thúc chuyển sdt về kiểu thường

        // Process
        $congTacVien = Auth::guard('cong_tac_vien')->user();


        $errors = [];
        $checkSoDienThoai = $this->congTacVien->findBySDTDaXacThuc($data['so_dien_thoai']);
        if (!empty($checkSoDienThoai)) {
            $errors[] = 'Số điện thoại này đã được sử dụng';
        }

        $checkCMND = $this->congTacVien->findByCMNDDaXacThuc($data['cmnd']);
        if (!empty($checkCMND)) {
            $errors[] = 'Số chứng minh nhân dân này đã được sử dụng';
        }

        if (count($errors) > 0) {
            return validate_errors($errors);
        }

        // check sdt da duoc su dung hay chua
        if (!empty($congTacVien->img_01)) {
            unlink(public_path() . $congTacVien->img_01);
        }
        if (!empty($congTacVien->img_02)) {
            unlink(public_path() . $congTacVien->img_02);
        }
        if (!empty($congTacVien->avatar) && $congTacVien->avatar != '/images/users/default-user.png') {
            unlink(public_path() . $congTacVien->avatar);
        }
        if ($congTacVien->is_kich_hoat === CongTacVien::IS_KICH_HOAT['NOT_YET'] ||
            $congTacVien->is_kich_hoat === CongTacVien::IS_KICH_HOAT['NOT_ALLOW']) {
            $congTacVien->is_kich_hoat      = CongTacVien::IS_KICH_HOAT['PENDING'];
            $congTacVien->cmnd              = $data['cmnd'];
            $congTacVien->so_dien_thoai     = $data['so_dien_thoai'];
            $congTacVien->so_tai_khoan      = $data['so_tai_khoan'];
            $congTacVien->id_ngan_hang      = $data['id_ngan_hang'];
            $congTacVien->ngay_sinh         = $data['ngay_sinh'];
            $congTacVien->gioi_tinh         = ($data['gioi_tinh'] === CongTacVien::GIOI_TINH['NAM']) ? CongTacVien::GIOI_TINH['NAM'] : CongTacVien::GIOI_TINH['NU'];
            $congTacVien->facebook          = $data['facebook'];
            $congTacVien->dia_chi_hien_tai  = $data['dia_chi_hien_tai'];
            $congTacVien->dia_chi_cmnd      = $data['dia_chi_cmnd'];
            $congTacVien->ten_chu_tai_khoan = $data['ten_chu_tai_khoan'];
            $congTacVien->ten_chi_nhanh     = $data['ten_chi_nhanh'];
            $congTacVien->tinh_thanh        = $data['tinh_thanh'];
            $congTacVien->img_01            = save_image($data['img_01']);
            $congTacVien->img_02            = save_image($data['img_02']);
            $congTacVien->avatar            = save_image($data['img_avatar']);
            $congTacVien->save();

            return view('layouts.info', [
                'title' => 'Thông báo', 'message' => 'Hồ sơ của bạn đã được gửi đi, vui lòng chờ 1-2 ngày để được duyệt.', 'link' => route('cong_tac_vien.auth.login')
            ]);
        } else {
            return view('layouts.info', [
                'title' => 'Thông báo', 'message' => 'Hồ sơ của bạn đã được gửi đi, vui lòng chờ 1-2 ngày để được duyệt.', 'link' => route('cong_tac_vien.auth.login')
            ]);
        }
    }

    public function adminXacThuc(Request $request, $hash)
    {
        $congTacVien = $this->congTacVien->findByTxid($hash);

        if (empty($congTacVien)) {
            return view('layouts.info', [
                'title' => 'Thông báo', 'message' => 'Liên kết không đúng', 'link' => route('cong_tac_vien.auth.login')
            ]);
        } else {
            if ($congTacVien->admin_kich_hoat === CongTacVien::ADMIN_KICH_HOAT['YES']) {
                return redirect()->route('cong_tac_vien.auth.login');
            }

            $congTacVien->admin_kich_hoat = CongTacVien::ADMIN_KICH_HOAT['YES'];
            $congTacVien->save();

            return view('layouts.info', [
                'title' => 'Thông báo', 'message' => 'Tài khoản của bạn đã được kích hoạt', 'link' => route('cong_tac_vien.auth.login')
            ]);
        }
    }
}
