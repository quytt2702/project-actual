<?php

namespace App\Http\Controllers\CongTacVien;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\LogThuongDaiLyRepository;
use App\Repositories\Contracts\LogThuongDonHangRepository;
use App\Repositories\Contracts\LogThuongGioiThieuRepository;
use App\Repositories\Contracts\PhanTramThuongDaiLyRepository;
use App\Repositories\Contracts\LogLichSuNapDiemBangCardRepository;

class LichSuGiaoDichController extends Controller
{
    protected $logThuongDaiLy;
    protected $logThuongDonHang;
    protected $logThuongGioiThieu;
    protected $phanTramThuongDaiLy;
    protected $logLichSuNapDiemBangCard;

    public function __construct(
        LogThuongDaiLyRepository $logThuongDaiLy,
        LogThuongDonHangRepository $logThuongDonHang,
        LogThuongGioiThieuRepository $logThuongGioiThieu,
        PhanTramThuongDaiLyRepository $phanTramThuongDaiLy,
        LogLichSuNapDiemBangCardRepository $logLichSuNapDiemBangCard
    ) {
        $this->logThuongDaiLy           = $logThuongDaiLy;
        $this->logThuongDonHang         = $logThuongDonHang;
        $this->logThuongGioiThieu       = $logThuongGioiThieu;
        $this->phanTramThuongDaiLy      = $phanTramThuongDaiLy;
        $this->logLichSuNapDiemBangCard = $logLichSuNapDiemBangCard;
    }

    public function index(Request $request)
    {
        $user = Auth::guard('cong_tac_vien')->user();
        $lichSuGiaoDich = [];
        $index = 1;
        $thuongGioiThieuThanhVien   = $this->logThuongGioiThieu->thuongGioiThieuThanhVien($user);
        $thuongMuaHang              = $this->logThuongDonHang->thuongMuaHang($user);
        $lichSuNapDiem              = $this->logLichSuNapDiemBangCard->getByEmail($user->email);
        if ($user->is_dai_ly === 'YES') {
            $thuongDaiLy01              = $this->logThuongDonHang->thuongDaiLyThang($user);
            $thuongDaiLy02              = $this->logThuongDaiLy->getByCTV($user);
        }

        if (!empty($thuongGioiThieuThanhVien)) {
            foreach ($thuongGioiThieuThanhVien as $item) {
                $lichSuGiaoDich[] = [
                    'index'  => $index++,
                    'col_01' => $item->email,
                    'col_02' => number_format($item->so_tien) . ' VND',
                    'col_03' => 'Thưởng giới thiệu thành viên',
                    'col_04' => substr($item->created_at, 0, 10),
                ];
            }
        }

        if (!empty($thuongMuaHang)) {
            foreach ($thuongMuaHang as $item) {
                if ($item->so_tien_duoc_thuong > 0) {
                    $lichSuGiaoDich[] = [
                        'index'  => $index++,
                        'col_01' => $item->email_khach_hang_mua,
                        'col_02' => number_format($item->so_tien_duoc_thuong) . ' VND',
                        'col_03' => 'Thưởng giới thiệu đơn hàng',
                        'col_04' => substr($item->created_at, 0, 10),
                    ];
                }
            }
        }

        if (!empty($lichSuNapDiem)) {
            foreach ($lichSuNapDiem as $item) {
                $lichSuGiaoDich[] = [
                    'index'  => $index++,
                    'col_01' => $item->email_nap_diem,
                    'col_02' => $item->so_diem . ' MILK',
                    'col_03' => ($item->so_diem == 0) ? 'Nạp Milk thất bại':'Nạp Milk vào tài khoản',
                    'col_04' => substr($item->created_at, 0, 10),
                ];
            }
        }

        if ($user->is_dai_ly === 'YES') {
            $date = 'Tháng ' . date("m") . '/' . date("Y");
            $thuongDaiLy01TongTien = empty($thuongDaiLy01->tong_tien) ? 0 : $thuongDaiLy01->tong_tien;
            $phanTramThuongDaiLyPhanTramThuong = empty($phanTramThuongDaiLy->phan_tram_thuong) ? 0 : $phanTramThuongDaiLy->phan_tram_thuong;

            $lichSuGiaoDich[] = [
                'index'  => $index++,
                'col_01' => $user->email,
                'col_02' => number_format($thuongDaiLy01TongTien) . ' VND',
                'col_03' => 'Tổng số tiền khách đã mua hàng do đại lý quản lý (Không phải tiền thuởng)',
                'col_04' => $date,
            ];

            if (!empty($thuongDaiLy02)) {
                foreach ($thuongDaiLy02 as $item) {
                    if ($item->so_tien_thuong > 0) {
                        $lichSuGiaoDich[] = [
                            'index' => $index++,
                            'col_01' => $user->email,
                            'col_02' => number_format($item->so_tien_thuong),
                            'col_03' => 'Thưởng đại lý (Đã trao thưởng)',
                            'col_04' => substr($item->created_at, 0, 10),
                        ];
                    }
                }
            }
        }

        return view('cong_tac_vien.lich_su_giao_dich.index', compact('lichSuGiaoDich'));//compact('thuongGioiThieuThanhVien', 'lichSuNapDiem', 'thuongMuaHang', 'thuongDaiLy01', 'thuongDaiLy02', 'phanTramThuongDaiLy'));
    }
}
