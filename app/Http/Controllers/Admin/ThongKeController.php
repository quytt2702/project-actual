<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\CongTacVienRepository;
use App\Repositories\Contracts\HoaDonBanHangRepository;
use App\Repositories\Contracts\ChiTietHoaDonBanSanPhamRepository;
use App\Validators\Admin\ThongKe\CTVTichCucValidator;
use App\Validators\Admin\ThongKe\NguoiDangKyNgayThangNamValidator;

class ThongKeController extends Controller
{
    protected $congTacVien;
    protected $hoaDonBanHang;
    protected $chiTietHoaDonBanHang;
    protected $paginate = 20;

    public function __construct(
        CongTacVienRepository $congTacVien,
        HoaDonBanHangRepository $hoaDonBanHang,
        ChiTietHoaDonBanSanPhamRepository $chiTietHoaDonBanHang
    ) {
        $this->congTacVien              = $congTacVien;
        $this->hoaDonBanHang            = $hoaDonBanHang;
        $this->chiTietHoaDonBanHang     = $chiTietHoaDonBanHang;
    }

    public function ngayThangNam()
    {
        return view('admin.thong_ke.nguoi_dang_ki.ngay_thang_nam');
    }

    public function tableNgayThangNam(NguoiDangKyNgayThangNamValidator $validator, $startDate, $endDate)
    {
        $data = [
            'dateStart' => $startDate,
            'dateEnd'   => $endDate,
        ];

        $validator->with($data)->passesOrFail();

        $tu         = $data['dateStart'];
        $tuNgay     = substr($tu, 8, 2);
        $tuThang    = substr($tu, 5, 2);
        $tuNam      = substr($tu, 0, 4);
        $from       = Carbon::create($tuNam, $tuThang, $tuNgay)->startOfDay();

        $den        =  $data['dateEnd'];
        $denNgay    = substr($den, 8, 2);
        $denThang   = substr($den, 5, 2);
        $denNam     = substr($den, 0, 4);
        $to         = Carbon::create($denNam, $denThang, $denNgay)->endOfDay();

        $fromDate   = Carbon::create($tuNam, $tuThang, $tuNgay);
        $toDate     = Carbon::create($denNam, $denThang, $denNgay);

        // Kiểm tra ngày từ và ngày đến có nằm trong khoảng cho phép không
        if ($fromDate->diffInDays($toDate) > 29) {
            return [
                'message' => 'Hệ thống chỉ thống kê trong khoảng 30 ngày',
                'view'    => '',
            ];
        }
        // Kết thúc kiểm tra ngày từ và ngày đến có nằm trong khoảng cho phép không

        // Sinh mảng theo ngày từ và ngày đến
        $dateArray = [];
        while ($fromDate->diffInDays($toDate) > 0) {
            $dateArray[] = $fromDate->copy();
            $fromDate    = $fromDate->addDay()->copy();
        }
        $dateArray[] = $fromDate->copy();
        // Kết thúc sinh mảng theo ngày từ và ngày đến

        // Tạo thông số vẽ chart
        $data1 = [];
        $data2 = [];
        $dataLabel = [];

        foreach ($dateArray as $item) {
            $data1[]     = $this->congTacVien->getCongTacVienByDay($item)->count();
            $data2[]     = $this->congTacVien->getCongTacVienDaXacThucByDay($item)->count();
            $dataLabel[] = convertGioPhutGiay($item->day) . '/' . convertGioPhutGiay($item->month) . '/' . $item->year;
        }
        $data1     = json_encode($data1);
        $data2     = json_encode($data2);
        $dataLabel = json_encode($dataLabel);
        // Kết thúc tạo thông số vẽ chart

        $congTacVienView = $this->congTacVien->searchCTVNgayThangNam($from, $to, $this->paginate);

        return [
            'view'    => view('admin.thong_ke.nguoi_dang_ki.partials.table_ngay_thang_nam', compact('congTacVienView', 'data1', 'data2', 'dataLabel'))->render(),
            'message' => '',
        ];
    }

    public function thangNam()
    {
        return view('admin.thong_ke.nguoi_dang_ki.thang_nam');
    }

    public function tableThangNam($date)
    {
        $tuThang    = substr($date, 5, 2);
        $tuNam      = substr($date, 0, 4);
        $from       = Carbon::create($tuNam, $tuThang)->startOfMonth();
        $to         = Carbon::create($tuNam, $tuThang)->endOfMonth();

        $congTacVien = $this->congTacVien->searchCTVNgaythangNam($from, $to, $this->paginate);

        return view('admin.thong_ke.nguoi_dang_ki.partials.table_thang_nam', compact('congTacVien'));
    }

    public function sidebarNguoiDangKy($startDate, $endDate)
    {
        // hàm trả về giá trị bên siderbar của view
        $tu         = $startDate;
        $tuThang    = substr($tu, 5, 2);
        $tuNam      = substr($tu, 0, 4);

        $den        =  $endDate;
        $denThang   = substr($den, 5, 2);
        $denNam     = substr($den, 0, 4);

        $tong       = ($denNam - $tuNam) * 12 + $denThang - $tuThang;
        if ($tong < 0) {
            return return_error('Thời gian kết thúc phải lớn hơn thời gian bắt đầu');
        } elseif ($tong > 20) {
            return return_error('chỉ được thống kê tối đa đến 20 tháng');
        }

        $check      = (date('Y') - $denNam) * 12 + date('m')- $denThang;
        if ($check < 0) {
            return return_error('Thời gian đến phải trước thời gian hiện tại');
        }
        $html  = view('admin.thong_ke.partials.sider_bar_header')->render();
        $thang = $tuThang;
        $nam   = $tuNam;
        for ($index = 0; $index <= $tong; $index++) {
            $from       = Carbon::create($nam, $thang)->startOfMonth();
            $to         = Carbon::create($nam, $thang)->endOfMonth();
            $sidebar    = $this->congTacVien->searchCTVNgaythangNam($from, $to);
            $html_body  = view('admin.thong_ke.partials.sider_bar_body', compact('nam', 'thang', 'sidebar'))->render();
            $html = $html . $html_body;
            if ($thang == $denThang && $nam == $denNam) {
                break;
            }
            if ($thang == 12) {
                $nam++;
                $thang=1;
                continue;
            }
            $thang++;
        }

        $html_footer = view('admin.thong_ke.partials.sider_bar_footer')->render();
        $html = $html . $html_footer;

        return $html;
    }

    public function hoaDonNgayThangNam()
    {
        return view('admin.thong_ke.hoa_don_ban_hang.ngay_thang_nam');
    }

    public function tableHoaDonNgayThangNam(NguoiDangKyNgayThangNamValidator $validator, $startDate, $endDate)
    {
        $data = [
            'dateStart' => $startDate,
            'dateEnd'   => $endDate,
        ];
        $validator->with($data)->passesOrFail();

        $tu         = $data['dateStart'];
        $tuNgay     = substr($tu, 8, 2);
        $tuThang    = substr($tu, 5, 2);
        $tuNam      = substr($tu, 0, 4);
        $from       = Carbon::create($tuNam, $tuThang, $tuNgay)->startOfDay();

        $den        =  $data['dateEnd'];
        $denNgay    = substr($den, 8, 2);
        $denThang   = substr($den, 5, 2);
        $denNam     = substr($den, 0, 4);

        $to         = Carbon::create($denNam, $denThang, $denNgay)->endOfDay();

        $hoaDonBanHang = $this->hoaDonBanHang->searchHDBHNgayThangNam($from, $to, $this->paginate);
        return view('admin.thong_ke.hoa_don_ban_hang.partials.table_ngay_thang_nam', compact('hoaDonBanHang'));
    }

    public function hoadonThangNam()
    {
        return view('admin.thong_ke.hoa_don_ban_hang.thang_nam');
    }

    public function tableThangNamHoaDon($date)
    {
        // hàm khi click vào sidebar bên tay trái sẽ xổ view dữ liệu ra
        $tu         = $date;
        $tuThang    = substr($tu, 5, 2);
        $tuNam      = substr($tu, 0, 4);
        $from       = Carbon::create($tuNam, $tuThang)->startOfMonth();

        $to = Carbon::create($tuNam, $tuThang)->endOfMonth();

        $hoaDonBanHang = $this->hoaDonBanHang->searchHDBHNgayThangNam($from, $to, $this->paginate);

        return view('admin.thong_ke.hoa_don_ban_hang.partials.table_thang_nam', compact('hoaDonBanHang'));
    }

    public function sidebarHoaDon($startDate, $endDate)
    {
        // hàm trả về giá trị bên siderbar của view
        $tu         = $startDate;
        $tuThang    = substr($tu, 5, 2);
        $tuNam      = substr($tu, 0, 4);

        $den        =  $endDate;
        $denThang   = substr($den, 5, 2);
        $denNam     = substr($den, 0, 4);

        $tong = ($denNam - $tuNam) * 12 + $denThang - $tuThang;
        if ($tong < 0) {
            return return_error('Thời gian kết thúc phải lớn hơn thời gian bắt đầu');
        } elseif ($tong > 20) {
            return return_error('chỉ được thống kê tối đa đến 20 tháng');
        }

        $check      = (date('Y') - $denNam) * 12 + date('m')- $denThang;
        if ($check < 0) {
            return return_error('Thời gian đến phải trước thời gian hiện tại');
        }
        $html  = view('admin.thong_ke.partials.sider_bar_header')->render();
        $thang = $tuThang;
        $nam   = $tuNam;
        for ($index = 0; $index <= $tong; $index++) {
            $from       = Carbon::create($nam, $thang)->startOfMonth();
            $to         = Carbon::create($nam, $thang)->endOfMonth();
            $sidebar = $this->hoaDonBanHang->searchHDBHNgayThangNam($from, $to);
            $html_body = view('admin.thong_ke.partials.sider_bar_body', compact('nam', 'thang', 'sidebar'))->render();
            $html = $html . $html_body;
            if ($thang == $denThang && $nam == $denNam) {
                break;
            }
            if ($thang == 12) {
                $nam++;
                $thang=1;
                continue;
            }
            $thang++;
        }

        $html_footer = view('admin.thong_ke.partials.sider_bar_footer')->render();
        $html = $html . $html_footer;

        return $html;
    }

    public function show($id)
    {
        $chiTietHoaDonBanHang = $this->chiTietHoaDonBanHang->getByIdHoaDonBanHangWithSanPham($id);

        return view('admin.thong_ke.hoa_don_ban_hang.partials.show_detail', compact('chiTietHoaDonBanHang'));
    }

    public function ctvTichCucGioiThieu()
    {
        return view('admin.thong_ke.ctv_tich_cuc.gioi_thieu');
    }

    public function ctvTichCucBanHang()
    {
        return view('admin.thong_ke.ctv_tich_cuc.ban_hang');
    }

    public function tableCTVTichCucGioiThieu($thang, $nam, CTVTichCucValidator $validator)
    {
        $data = [
            'thang' => $thang,
            'nam'   => $nam,
        ];

        $validator->with($data)->passesOrFail();

        $check       = (date('Y') - $data['nam']) * 12 + date('m')- $data['thang'];
        if ($check < 0) {
            return return_error('Thời gian đến phải trước thời gian hiện tại');
        }

        $congTacVien = $this->congTacVien->getDanhSachCongTacVienTichCucGioiThieu($data['thang'], $data['nam'], $this->paginate);

        return view('admin.thong_ke.ctv_tich_cuc.partials.gioi_thieu', compact('congTacVien'));
    }

    public function tableCTVTichCucBanHang($thang, $nam, CTVTichCucValidator $validator)
    {
        $data = [
            'thang' => $thang,
            'nam'   => $nam,
        ];

        $validator->with($data)->passesOrFail();

        $check       = (date('Y') - $data['nam']) * 12 + date('m')- $data['thang'];
        if ($check < 0) {
            return return_error('Thời gian đến phải trước thời gian hiện tại');
        }

        $congTacVien = $this->hoaDonBanHang->getDanhSachCongTacVienTichCucBanHang($data['thang'], $data['nam'], $this->paginate);

        return view('admin.thong_ke.ctv_tich_cuc.partials.ban_hang', compact('congTacVien'));
    }

    public function doanhThuBanHang()
    {
        return view('admin.thong_ke.doanh_thu_ban_hang.index');
    }

    public function tableDoanhThuBanHang($thang, $nam, CTVTichCucValidator $validator)
    {
        $tongTienDaNhan   = $this->hoaDonBanHang->tongTienDaNhan();
        $tongTienDaNhan   = $tongTienDaNhan->tong_tien_da_nhan;

        $tongTienDangGiao = $this->hoaDonBanHang->tongTienDangGiao();
        $tongTienDangGiao = $tongTienDangGiao->tong_tien_dang_giao;

        $tongTien         = $tongTienDaNhan + $tongTienDangGiao;

        $data = [
            'thang' => $thang,
            'nam'   => $nam,
        ];

        $validator->with($data)->passesOrFail();

        $check       = (date('Y') - $data['nam']) * 12 + date('m')- $data['thang'];
        if ($check < 0) {
            return return_error('Thời gian đến phải trước thời gian hiện tại');
        }

        $doanhThuBanHang = $this->hoaDonBanHang->getDoanhThuBanHang($data['thang'], $data['nam'], $this->paginate);

        return view('admin.thong_ke.doanh_thu_ban_hang.partials.table', compact('doanhThuBanHang', 'tongTienDaNhan', 'tongTienDangGiao', 'tongTien'));
    }

    public function chiTiet($id)
    {
        return view('admin.thong_ke.doanh_thu_ban_hang.show', compact('id'));
    }

    public function tableChiTiet($id)
    {
        $chiTietHoaDonBanHang = $this->chiTietHoaDonBanHang->getByIdHoaDonBanHangWithSanPham($id);

        return view('admin.thong_ke.doanh_thu_ban_hang.partials.table_chi_tiet', compact('chiTietHoaDonBanHang'));
    }
}
