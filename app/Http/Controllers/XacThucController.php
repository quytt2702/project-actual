<?php

namespace App\Http\Controllers;

use Auth;
use Uuid;
use Illuminate\Http\Request;

use App\Entities\CongTacVien;
use App\Validators\NguoiDung\StoreNguoiDungValidator;

class XacThucController extends Controller
{
    public function nguoiDung(Request $request)
    {
        // session()->flash('alert', [
        //     'title' => 'Thông báo',
        //     'message' => 'Bạn chưa xác thực tài khoản. Xác thực tại ',
        // ]);
        return view('nguoi_dung.xac_thuc.nguoi_dung');
    }

    public function admin(Request $request)
    {
    }

    public function xacThuc(Request $request, StoreNguoiDungValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $congTacVien = Auth::guard('cong_tac_vien')->user();

        if (!empty($congTacVien->img_01)) {
            unlink($congTacVien->img_01);
        }
        if (!empty($congTacVien->img_02)) {
            unlink($congTacVien->img_02);
        }
        if (!empty($congTacVien->avatar)) {
            unlink($congTacVien->avatar);
        }

        if ($congTacVien->is_kich_hoat === CongTacVien::IS_KICH_HOAT['NOT_YET']) {
            $congTacVien->is_kich_hoat      = CongTacVien::IS_KICH_HOAT['PENDING'];
            $congTacVien->cmnd              = $data['cmnd'];
            $congTacVien->so_tai_khoan      = $data['so_tai_khoan'];
            $congTacVien->id_ngan_hang      = $data['ngan_hang'];
            $congTacVien->ho_va_ten         = $data['ten'];
            $congTacVien->ngay_sinh         = $data['ngay_sinh'];
            $congTacVien->gioi_tinh         = ($data['gioi_tinh'] === 'nam') ? CongTacVien::GIOI_TINH['NAM'] : NguoiDung::GIOI_TINH['NU'];
            $congTacVien->img_01            = save_image($request->image_01);
            $congTacVien->img_02            = save_image($request->image_02);
            $congTacVien->save();

            return "Đã lưu thành công";
        } else {
            return "Hãy đợi admin duyệt";
        }
    }
}
