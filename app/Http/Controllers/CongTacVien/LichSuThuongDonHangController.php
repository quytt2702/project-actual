<?php

namespace App\Http\Controllers\CongTacVien;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\LogThuongDonHangRepository;

class LichSuThuongDonHangController extends Controller
{
    protected $logThuongDonHang;
    protected $paginate = 10;

    public function __construct(LogThuongDonHangRepository $logThuongDonHang)
    {
        $this->logThuongDonHang = $logThuongDonHang;
    }

    public function index(Request $request)
    {
        return view('cong_tac_vien.lich_su_thuong_don_hang.index');
    }

    public function table(Request $request)
    {
        $user = Auth::guard('cong_tac_vien')->user();
        $logThuongDonHang = $this->logThuongDonHang->allByEmail($user->email, $this->paginate);

        return view('cong_tac_vien.lich_su_thuong_don_hang.partials.lich_su_thuong_don_hang_body', compact('logThuongDonHang'));
    }
}
