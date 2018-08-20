<?php

namespace App\Http\Controllers\CongTacVien;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\TienNguoiDungRepository;

class DashboardController extends Controller
{
    protected $tienNguoiDung;

    public function __construct(TienNguoiDungRepository $tienNguoiDung)
    {
        $this->tienNguoiDung = $tienNguoiDung;
    }

    public function getDoanhThu($user, $subDay)
    {
        $doanhThu = 0;

        $log_thuong_dai_ly = select_raw('
            SELECT SUM(so_tien_thuong) as tien
            FROM log_thuong_dai_ly
            WHERE email_dai_ly = "' . $user->email . '" AND created_at > "' . Carbon::now()->subDays($subDay) .'"');

        $log_thuong_don_hang = select_raw('
            SELECT SUM(so_tien_duoc_thuong) as tien
            FROM log_thuong_don_hang
            WHERE ten_nguoi_duoc_thuong = "' . $user->email . '" AND created_at > "' . Carbon::now()->subDays($subDay) .'"');


        $log_thuong_gioi_thieu = select_raw('
            SELECT SUM(so_tien) as tien
            FROM log_thuong_gioi_thieu
            WHERE ten_nguoi_duoc_thuong = "' . $user->email . '" AND created_at > "' . Carbon::now()->subDays($subDay) .'"');

        $log_thuong_landing_page = select_raw('
            SELECT SUM(so_tien_duoc_thuong) as tien
            FROM log_thuong_landing_page
            WHERE ten_nguoi_duoc_thuong = "' . $user->email . '" AND created_at > "' . Carbon::now()->subDays($subDay) .'"');

        $doanhThu += empty($log_thuong_dai_ly->tien) ? 0 : $log_thuong_dai_ly->tien;
        $doanhThu += empty($log_thuong_don_hang->tien) ? 0 : $log_thuong_don_hang->tien;
        $doanhThu += empty($log_thuong_gioi_thieu->tien) ? 0 : $log_thuong_gioi_thieu->tien;
        $doanhThu += empty($log_thuong_landing_page->tien) ? 0 : $log_thuong_landing_page->tien;

        return $doanhThu;
    }

    public function index(Request $request)
    {
        $user           = Auth::guard('cong_tac_vien')->user();
        $doanhThuNgay   = $this->getDoanhThu($user, 1);
        $doanhThuTuan   = $this->getDoanhThu($user, 7);
        $tienNguoiDung  = $this->tienNguoiDung->findByEmail($user->email);

        return view('cong_tac_vien.dashboard.index', compact('tienNguoiDung', 'doanhThuNgay', 'doanhThuTuan'));
    }
}
