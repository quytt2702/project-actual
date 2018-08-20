<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\CongTacVienRepository;
use App\Repositories\Contracts\LogThuongDaiLyRepository;
use App\Repositories\Contracts\LogThuongDonHangRepository;
use App\Repositories\Contracts\PhanTramThuongDaiLyRepository;

class ThuongDaiLyController extends Controller
{
    protected $congTacVien;
    protected $logThuongDaiLy;
    protected $logThuongDonHang;
    protected $phanTramThuongDaiLy;

    public function __construct(
        CongTacVienRepository $congTacVien,
        LogThuongDaiLyRepository $logThuongDaiLy,
        LogThuongDonHangRepository $logThuongDonHang,
        PhanTramThuongDaiLyRepository $phanTramThuongDaiLy
    ) {
        $this->congTacVien          = $congTacVien;
        $this->logThuongDaiLy       = $logThuongDaiLy;
        $this->logThuongDonHang     = $logThuongDonHang;
        $this->phanTramThuongDaiLy  = $phanTramThuongDaiLy;
    }

    public function index(Request $request)
    {
        $indexXemThuongDaiLyTrongThangHienTai = $this->logThuongDonHang->indexXemThuongDaiLyTrongThangHienTai();
        $xemThuongDaiLyTrongThangHienTai = [];
        foreach ($indexXemThuongDaiLyTrongThangHienTai as $item) {
            $phanTramThuongDuKien = $this->phanTramThuongDaiLy->findMucYeuCau($item->tong_tien);
            $congTacVien = $this->congTacVien->findByEmail($item->email_dai_ly_quan_ly);
            if (!empty($phanTramThuongDuKien) && !empty($congTacVien)) {
                $soTienThuongDuKien   = $item->tong_tien * $phanTramThuongDuKien->phan_tram_thuong / 100;
                $xemThuongDaiLyTrongThangHienTai[] = [
                    'tong_tien'                 => number_format($item->tong_tien),
                    'sdt'                       => $congTacVien->so_dien_thoai,
                    'ho_va_ten'                 => $congTacVien->ho_va_ten,
                    'email'                     => $congTacVien->email,
                    'pham_tram_thuong_du_kien'  => $phanTramThuongDuKien->phan_tram_thuong . "%",
                    'so_tien_thuong'            => number_format($soTienThuongDuKien),
                ];
            }
        }

        return view('admin.thuong_dai_ly.index', compact('xemThuongDaiLyTrongThangHienTai'));
    }

    public function timKiem(Request $request, $content)
    {
        $timKiemPart1 = $this->logThuongDonHang->timKiemPart1($content);
        $timKiemPart2 = $this->logThuongDaiLy->timKiemPart2($content);
        $phanTramThuongDaiLy = 0;
        if (!empty($timKiemPart1)) {
            $phanTramThuongDaiLy = $this->phanTramThuongDaiLy->findMucYeuCau($timKiemPart1->tong_tien);
        }

        return view('admin.thuong_dai_ly.partials.tim_kiem', compact('timKiemPart1', 'timKiemPart2', 'phanTramThuongDaiLy'));
    }

    public function xem(Request $request, $thang, $nam)
    {
        $xemThangNamThuongDaiLy = $this->logThuongDaiLy->xemThangNamThuongDaiLy($thang, $nam);
        $thang_hientai = date('m');
        $nam_hientai = date('Y');
        if ($thang == $thang_hientai && $nam == $nam_hientai) {
            return [
                'refresh' => true,
                'view' => '',
            ];
        }
        return [
                'refresh' => false,
                'view' => view('admin.thuong_dai_ly.partials.xem', compact('xemThangNamThuongDaiLy', 'thang', 'nam'))->render(),
        ];
    }
}
