<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Repositories\Contracts\KhachHangRepository;
use App\Repositories\Contracts\CongTacVienRepository;

class EmailMarketingController extends Controller
{
    protected $khachHang;
    protected $congTacVien;

    public function __construct(
        KhachHangRepository $khachHang,
        CongTacVienRepository $congTacVien
    ) {
        $this->khachHang   = $khachHang;
        $this->congTacVien = $congTacVien;
    }

    public function index(Request $request)
    {
        return view('admin.email_marketing.index');
    }

    public function downloadCTVExcel($congTacVien, $fileName)
    {
        $path = storage_path($fileName);
        $spreadsheet = new Spreadsheet();

        $congTacVienNew[] = [
            '#', 'Email', 'Họ và tên', 'Giới tính', 'Ngày sinh',
            'Số điện thoại', 'Địa chỉ', 'CMND', 'Số thành viên giới thiệu',
            'Số tài khoản', 'Ngân hàng', 'Chi nhánh',
            'Facebook',  'Email giới thiệu', 'Ngày đăng ký'
        ];
        $index = 1;
        foreach ($congTacVien as $item) {
            $congTacVienNew[] = [
                '#'                        => $index,
                'Email'                    => $item->email,
                'Họ và tên'                => $item->ho_va_ten,
                'Giới tính'                => $item->gioi_tinh,
                'Ngày sinh'                => substr($item->ngay_sinh, 0, 10),
                'Số điện thoại'            => $item->so_dien_thoai,
                'Địa chỉ'                  => $item->dia_chi_hien_tai,
                'CMND'                     => $item->cmnd,
                'Số thành viên giới thiệu' => $item->so_tai_khoan,
                'Số tài khoản'             => $item->so_tai_khoan,
                'Ngân hàng'                => $item->ten_ngan_hang,
                'Chi nhánh'                => $item->ten_chi_nhanh,
                'Facebook'                 => $item->facebook,
                'Email giới thiệu'         => $item->email_gioi_thieu,
                'Ngày đăng ký'             => substr($item->created_at, 0, 10),
            ];
            $index++;
        }

        $spreadsheet->getActiveSheet()->fromArray($congTacVienNew);

        // Auto size columns
        foreach (range('A', 'Z') as $item) {
            $spreadsheet->getActiveSheet()->getColumnDimension($item)->setAutoSize(true);
        }
       // End auto size columns

        $writer = new Xlsx($spreadsheet);
        ob_end_clean();
        $writer->save($path);

        $headers = [
            'Content-Type'        => 'application/vnd.ms-excel',
            'Content-Disposition' => 'attachment;filename="' . $fileName . '"',
            'Cache-Control'       => 'max-age=0',
        ];

        return response()->download($path, $fileName, $headers)->deleteFileAfterSend(true);
    }

    public function ctvDaXacThuc(Request $request)
    {
        $congTacVien = $this->congTacVien->getDaXacThuc();
        $fileName = 'CongTacVienDaXacThuc.xlsx';

        return $this->downloadCTVExcel($congTacVien, $fileName);
    }

    public function ctvTatCa(Request $request)
    {
        $congTacVien = $this->congTacVien->all();
        $fileName = 'CongTacVien.xlsx';

        return $this->downloadCTVExcel($congTacVien, $fileName);
    }

    public function daiLy(Request $request)
    {
        $congTacVien = $this->congTacVien->getDaiLy();
        $fileName = 'DaiLy.xlsx';

        return $this->downloadCTVExcel($congTacVien, $fileName);
    }

    public function khachHang(Request $request)
    {
        $khachHang = $this->khachHang->all();
        $fileName = 'KhachHang.xlsx';
        $path = storage_path($fileName);
        $spreadsheet = new Spreadsheet();

        $khachHangNew[] = [
            '#', 'Email', 'Họ tên', 'Số điện thoại',
            'Đường', 'Phường', 'Quận huyện', 'Thành phố',
            'Email CTV giới thiệu', 'Ngày tạo',
        ];

        $index = 1;
        foreach ($khachHang as $item) {
            $khachHangNew[] = [
                '#'                    => $index,
                'Email'                => $item->email,
                'Họ tên'               => $item->ho_ten,
                'Số điện thoại'        => $item->sdt,
                'Đường'                => $item->duong,
                'Phường'               => $item->phuong,
                'Quận huyện'           => $item->quan_huyen,
                'Thành phố'            => $item->thanh_pho,
                'Email CTV giới thiệu' => $item->email_ctv,
                'Ngày tạo'             => substr($item->created_at, 0, 10),
            ];
            $index++;
        }

        $spreadsheet->getActiveSheet()->fromArray($khachHangNew);

        // Auto size columns
        foreach (range('A', 'Z') as $item) {
            $spreadsheet->getActiveSheet()->getColumnDimension($item)->setAutoSize(true);
        }
       // End auto size columns

        $writer = new Xlsx($spreadsheet);
        ob_end_clean();
        $writer->save($path);

        $headers = [
            'Content-Type'        => 'application/vnd.ms-excel',
            'Content-Disposition' => 'attachment;filename="' . $fileName . '"',
            'Cache-Control'       => 'max-age=0',
        ];

        return response()->download($path, $fileName, $headers)->deleteFileAfterSend(true);
    }
}
