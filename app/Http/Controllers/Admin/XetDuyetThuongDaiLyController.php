<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\TienNguoiDungRepository;
use App\Repositories\Contracts\LogThuongDaiLyRepository;
use App\Repositories\Contracts\LogThuongDonHangRepository;
use App\Repositories\Contracts\PhanTramThuongDaiLyRepository;
use App\Repositories\Contracts\CongTacVienRepository;

class XetDuyetThuongDaiLyController extends Controller
{
    protected $tienNguoiDung;
    protected $logThuongDonHang;
    protected $logThuongDaiLy;
    protected $phanTramThuongDaiLy;
    protected $congTacVien;

    public function __construct(
        TienNguoiDungRepository $tienNguoiDung,
        LogThuongDaiLyRepository $logThuongDaiLy,
        LogThuongDonHangRepository $logThuongDonHang,
        PhanTramThuongDaiLyRepository $phanTramThuongDaiLy,
        CongTacVienRepository   $congTacVien
    ) {
        $this->tienNguoiDung = $tienNguoiDung;
        $this->logThuongDaiLy = $logThuongDaiLy;
        $this->logThuongDonHang = $logThuongDonHang;
        $this->phanTramThuongDaiLy = $phanTramThuongDaiLy;
        $this->congTacVien = $congTacVien;
    }

    public function index(Request $request)
    {
        $thang = date('m') - 1;
        $nam = date("Y");
        if ($thang === 0) {
            $thang = 12;
            $nam--;
        }

        $kiemTraThuong = $this->logThuongDaiLy->kiemTraThuong($thang, $nam);
        $tinh_trang = 'Chưa trao thuởng';
        if (!empty($kiemTraThuong)) {
            $tinh_trang = 'Đã trao thuởng vào ngày ' . substr($kiemTraThuong->created_at, 0, 10);
        }

        $indexXemThuongDaiLyTrongThangTruocDo = $this->logThuongDonHang->indexXemThuongDaiLyTrongThangTruocDo($thang, $nam);
        $xemThuongDaiLyTrongThangHienTai = [];
        foreach ($indexXemThuongDaiLyTrongThangTruocDo as $item) {
            $congTacVien = $this->congTacVien->findByEmail($item->email_dai_ly_quan_ly);
            $phanTramThuongDuKien = $this->phanTramThuongDaiLy->findMucYeuCau($item->tong_tien);
            $phantramThuong = (empty($phanTramThuongDuKien)) ? 0 : $phanTramThuongDuKien->phan_tram_thuong;
            $soTienThuongDuKien   = $item->tong_tien * $phantramThuong / 100;
            $xemThuongDaiLyTrongThangHienTai[] = [
                'tong_tien'                 => number_format($item->tong_tien),
                'sdt'                       => $congTacVien->so_dien_thoai,
                'ho_va_ten'                 => $congTacVien->ho_va_ten,
                'email'                     => $congTacVien->email,
                'pham_tram_thuong_du_kien'  => $phantramThuong,
                'so_tien_thuong'            => number_format($soTienThuongDuKien),
                'tinh_trang'                => $tinh_trang,
            ];
        }

        return view('admin.xet_duyet_thuong_dai_ly.index', compact('xemThuongDaiLyTrongThangHienTai', 'thang', 'nam'));
    }

    public function thuong(Request $request)
    {
        $thang = date('m') - 1;
        $nam = date("Y");
        if ($thang === 0) {
            $thang = 12;
            $nam--;
        }
        $kiemTraThuong = $this->logThuongDaiLy->kiemTraThuong($thang, $nam);
        if (!empty($kiemTraThuong)) {
            return return_message('toastr', 'success', 'Tháng ' . $thang . '/' . $nam . ' đã đuợc thuởng vào ngày ' . $kiemTraThuong->created_at);
        }

        $indexXemThuongDaiLyTrongThangTruocDo = $this->logThuongDonHang->indexXemThuongDaiLyTrongThangTruocDo($thang, $nam);
        foreach ($indexXemThuongDaiLyTrongThangTruocDo as $item) {
            $congTacVien = $this->congTacVien->findByEmail($item->email_dai_ly_quan_ly);
            $phanTramThuongDuKien = $this->phanTramThuongDaiLy->findMucYeuCau($item->tong_tien);
            $soTienThuongDuKien   = $item->tong_tien * $phanTramThuongDuKien->phan_tram_thuong / 100;
            // Bắt đầu lưu log thuởng đại lý
            // Kết thúc lưu log thuởng đại lý
            $this->logThuongDaiLy->create([
                'thang'             =>  $thang,
                'nam'               =>  $nam,
                'email_dai_ly'      =>  $congTacVien->email,
                'sdt'               =>  $congTacVien->so_dien_thoai,
                'so_tien_thuong'    =>  $soTienThuongDuKien,
                'doanh_thu'         =>  $item->tong_tien,
                'tinh_trang'        =>  'Đã trao thưỏng',
            ]);
            // Bắt đầu ghi dữ liệu tiền nguời dùng, cả 2 truờng là
            // 1. Tổng tiền vnd (để tính toán và trừ tiền)
            // 2. Thuởng đại lý (để xem)
            $dai_ly = $this->tienNguoiDung->findbyEmail($item->email_dai_ly_quan_ly);
            $dai_ly->tong_tien_vnd += $soTienThuongDuKien;
            $dai_ly->thuong_dai_ly += $soTienThuongDuKien;
            $dai_ly->save();
        }

        return return_message('toastr', 'success', 'Thực hiện trao thưởng đại lý thành công!.');
    }
}
