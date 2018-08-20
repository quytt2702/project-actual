<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Repositories\Contracts\LogHoaDonNhapHangRepository;

class LichSuHoaDonNhapHangController extends Controller
{
    protected $logHoaDonNhapHang;

    public function __construct(LogHoaDonNhapHangRepository $logHoaDonNhapHang)
    {
        $this->logHoaDonNhapHang = $logHoaDonNhapHang;
    }

    public function index(Request $request, $id_don_hang)
    {
        $logHoaDonNhapHang = $this->logHoaDonNhapHang->getByIdHoaDonNhapHang($id_don_hang);

        if (empty($logHoaDonNhapHang) || count($logHoaDonNhapHang) === 0) {
            return redirect()->route('admin.hoa_don_nhap_hang.index');
        }

        return view('admin.lich_su_hoa_don_nhap_hang.index', compact('logHoaDonNhapHang'));
    }

    public function chiTiet(Request $request, $ngay_thay_doi)
    {
        $logHoaDonNhapHang = $this->logHoaDonNhapHang->getByNgayThayDoiWithNhaCungCapWithSanPham($ngay_thay_doi);

        return view('admin.lich_su_hoa_don_nhap_hang.partials.chi_tiet', compact('logHoaDonNhapHang'));
    }
}
