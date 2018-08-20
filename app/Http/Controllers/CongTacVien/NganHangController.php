<?php

namespace App\Http\Controllers\CongTacVien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entities\LogTaiKhoanNganHang;
use App\Repositories\Contracts\CongTacVienRepository;
use App\Repositories\Contracts\LogTaiKhoanNganHangRepository;

class NganHangController extends Controller
{
    protected $congTacVien;
    protected $logTaiKhoanNganHang;

    public function __construct(
        CongTacVienRepository $congTacVien,
        LogTaiKhoanNganHangRepository $logTaiKhoanNganHang
    ) {
        $this->congTacVien          = $congTacVien;
        $this->logTaiKhoanNganHang  = $logTaiKhoanNganHang;
    }

    public function index(Request $request)
    {
        return view('cong_tac_vien.ngan_hang.index');
    }

    public function update(Request $request, $hash, $condition)
    {
        $logTaiKhoanNganHang = $this->logTaiKhoanNganHang->findByHash($hash);
        if (!empty($logTaiKhoanNganHang)) {
            if ($logTaiKhoanNganHang->trang_thai === LogTaiKhoanNganHang::TRANG_THAI['BLOCK'] ||
                $logTaiKhoanNganHang->trang_thai === LogTaiKhoanNganHang::TRANG_THAI['DONE']) {
                return view('layouts.info', [
                    'title' => 'Thông báo', 'message' => 'Liên kết này đã bị khoá hoặc đã sử dụng', 'link' => route('cong_tac_vien.auth.login')
                ]);
            }
            if ($condition === 'accept') {
                $logTaiKhoanNganHang->trang_thai = LogTaiKhoanNganHang::TRANG_THAI['DONE'];
                $logTaiKhoanNganHang->save();

                $congTacVien = $this->congTacVien->findByEmail($logTaiKhoanNganHang->email);
                $congTacVien->so_tai_khoan      = $logTaiKhoanNganHang->so_tai_khoan;
                $congTacVien->ten_chu_tai_khoan = $logTaiKhoanNganHang->ten_chu_tai_khoan;
                $congTacVien->ten_chi_nhanh     = $logTaiKhoanNganHang->ten_chi_nhanh;
                $congTacVien->save();

                return view('layouts.info', [
                    'title' => 'Thông báo', 'message' => 'Thông tin tài khoản ngân hàng của bạn đã được thay đổi', 'link' => route('cong_tac_vien.auth.login')
                ]);
            } else {
                $logTaiKhoanNganHang->trang_thai = LogTaiKhoanNganHang::TRANG_THAI['BLOCK'];
                $logTaiKhoanNganHang->save();

                return view('layouts.info', [
                    'title' => 'Thông báo', 'message' => 'Thông tin tài khoản ngân hàng đã không thay đổi', 'link' => route('cong_tac_vien.auth.login')
                ]);
            }
        } else {
            return view('layouts.info', [
                'title' => 'Thông báo', 'message' => 'Liên kết của bạn lỗi', 'link' => route('cong_tac_vien.auth.login')
            ]);
        }
    }
}
