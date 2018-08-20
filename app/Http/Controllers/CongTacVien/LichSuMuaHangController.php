<?php

namespace App\Http\Controllers\CongTacVien;

use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\HoaDonBanHangRepository;
use App\Repositories\Contracts\ChiTietHoaDonBanSanPhamRepository;

class LichSuMuaHangController extends Controller
{
    protected $hoaDonBanHang;
    protected $chiTietHoadonBanHang;
    protected $paginate = 10;

    public function __construct(HoaDonBanHangRepository $hoaDonBanHang, ChiTietHoaDonBanSanPhamRepository $chiTietHoadonBanHang)
    {
        $this->hoaDonBanHang            = $hoaDonBanHang;
        $this->chiTietHoadonBanHang     = $chiTietHoadonBanHang;
    }

    public function index()
    {
        return view('cong_tac_vien.lich_su_mua_hang.index', compact('hoaDonBanHang'));
    }

    public function table(Request $request)
    {
        $user = Auth::guard('cong_tac_vien')->user();
        $lichSuMuaHang = $this->hoaDonBanHang->getLichSuMuaHangCTV($user->email, $this->paginate);

        return view('cong_tac_vien.lich_su_mua_hang.partials.body-table', compact('lichSuMuaHang'));
    }

    public function show(Request $request, $id)
    {
        $chiTietHoadonBanHang = $this->chiTietHoadonBanHang->getByIdHoaDonBanHangWithSanPham($id);

        return view('cong_tac_vien.lich_su_mua_hang.partials.modal', compact('chiTietHoadonBanHang'));
    }

    public function getSearch(Request $request)
    {
        $search = $request->input_search;

        $user = Auth::guard('cong_tac_vien')->user();
        $lichSuMuaHang = $this->hoaDonBanHang->getLichSuMuaHangCTVWithSearch($user->email, $search, $this->paginate);

        return view('cong_tac_vien.lich_su_mua_hang.partials.body-table', compact('lichSuMuaHang'));
    }
}
