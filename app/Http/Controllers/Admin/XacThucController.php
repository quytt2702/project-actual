<?php

namespace App\Http\Controllers\Admin;

use DB;
use Uuid;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Jobs\SendMail;
use App\Entities\CongTacVien;
use App\Repositories\Contracts\KhachHangRepository;
use App\Repositories\Contracts\CongTacVienRepository;
use App\Repositories\Contracts\Admin\CaiDatRepository;
use App\Repositories\Contracts\TienNguoiDungRepository;
use App\Repositories\Contracts\LogThuongGioiThieuRepository;
use App\Validators\Admin\CongTacVien\DestroyCongTacVienValidator;

class XacThucController extends Controller
{
    protected $caiDat;
    protected $khachHang;
    protected $congTacVien;
    protected $tienNguoiDung;
    protected $logThuongGioiThieu;
    protected $paginate = 10;

    public function __construct(
        CaiDatRepository $caiDat,
        KhachHangRepository $khachHang,
        CongTacVienRepository $congTacVien,
        TienNguoiDungRepository $tienNguoiDung,
        LogThuongGioiThieuRepository $logThuongGioiThieu
    ) {
        $this->caiDat               = $caiDat;
        $this->khachHang            = $khachHang;
        $this->congTacVien          = $congTacVien;
        $this->tienNguoiDung        = $tienNguoiDung;
        $this->logThuongGioiThieu   = $logThuongGioiThieu;
    }

    public function index(Request $request)
    {
        return view('admin.xac_thuc.index');
    }

    public function table(Request $request)
    {
        $congTacVien = $this->congTacVien->getNewChuaXacThuc($this->paginate);

        return view('admin.xac_thuc.partials.body-table', compact('congTacVien'));
    }

    public function show(Request $request, $hash)
    {
        // Validate
        $congTacVien = $this->congTacVien->findByTxid($hash);
        if (empty($congTacVien)) {
            return redirect()->route('admin.xac_thuc.index');
        }

        return view('admin.xac_thuc.show', compact('congTacVien'));
    }

    public function duyet(Request $request, $hash, DestroyCongTacVienValidator $validator)
    {
        // Validate
        $data['txid'] = $hash;
        $validator->with($data)->passesOrFail();

        DB::beginTransaction();

        $congTacVien = $this->congTacVien->findByTxid($hash);

        // Kiểm tra email và số điện thoại đã xác thực chưa
        $errors = [];
        $checkSoDienThoai = $this->congTacVien->findBySDTDaXacThuc($congTacVien->so_dien_thoai);
        if (!empty($checkSoDienThoai)) {
            $errors[] = 'Số điện thoại này đã được sử dụng';
        }

        $checkCMND = $this->congTacVien->findByCMNDDaXacThuc($congTacVien->cmnd);
        if (!empty($checkCMND)) {
            $errors[] = 'Số chứng minh nhân dân này đã được sử dụng';
        }

        if (count($errors) > 0) {
            return validate_errors($errors);
        }

        // Process
        try {
            $congTacVien->is_kich_hoat = CongTacVien::IS_KICH_HOAT['DONE'];
            $congTacVien->save();

            // Tạo người dùng bảng tien_nguoi_dung
            $tienNguoiDung = $this->tienNguoiDung->findByEmail($congTacVien->email);
            if (empty($tienNguoiDung)) {
                $this->tienNguoiDung->create([
                    'email' => $congTacVien->email,
                ]);
            }

            // Check tồn tại
            $khachHang = $this->khachHang->findByEmailVaSdtNotOffline($congTacVien->email, $congTacVien->so_dien_thoai);
            if (empty($khachHang)) {
                $this->khachHang->create([
                    'email'     => $congTacVien->email,
                    'sdt'       => $congTacVien->so_dien_thoai,
                    'ho_ten'    => $congTacVien->ho_va_ten,
                    'duong'     => $congTacVien->dia_chi_hien_tai,
                    'email_ctv' => $congTacVien->email,
                ]);
            }

            if (empty($congTacVien->email_gioi_thieu)) {
                DB::commit();

                // Gửi mail thông báo duyệt
                $ho_ten = $congTacVien->ho_va_ten;
                SendMail::send($congTacVien->email, 'Thông báo đã duyệt thành viên', view('email.thong_bao_duyet_ctv', compact('ho_ten'))->render());

                return return_message('toastr', 'success', 'ĐÃ DUYỆT THÀNH CÔNG!!!. Người dùng này tự đăng ký, không có ai đuợc thưởng.');
            }

            $logThuongGioiThieu = $this->logThuongGioiThieu->kiemTraThuongGioiThieu($congTacVien);

            $caiDat = $this->caiDat->getConfig();

            if (empty($logThuongGioiThieu)) {
                $this->logThuongGioiThieu->create([
                    'ten_nguoi_duoc_thuong' => $congTacVien->email_gioi_thieu,
                    'ten_nguoi_lien_quan'   => $congTacVien->email,
                    'so_tien'               => $caiDat->thuong_gioi_thieu_dang_ky,
                    'li_do'                 => 'Thưởng do giới thiệu cộng tác viên mới!',
                    'hash'                  => Uuid::generate(4)->string,
                ]);

                // Cộng tiền
                $tienNguoiDung = $this->tienNguoiDung->findbyEmail($congTacVien->email_gioi_thieu);
                $tienNguoiDung->thuong_gioi_thieu_ctv   = $tienNguoiDung->thuong_gioi_thieu_ctv + $caiDat->thuong_gioi_thieu_dang_ky;
                $tienNguoiDung->tong_tien_vnd           = $tienNguoiDung->tong_tien_vnd + $caiDat->thuong_gioi_thieu_dang_ky;
                $tienNguoiDung->save();

                // quoclong_gui_email_3
                $congTacVienDuocThuongTien = $this->congTacVien->findByEmail($congTacVien->email_gioi_thieu);
                if (!empty($congTacVienDuocThuongTien)) {
                    $ho_ten = $congTacVienDuocThuongTien->ho_va_ten;
                    SendMail::send($congTacVienDuocThuongTien->email, 'Thông báo thưởng tiền', view('email.thong_bao_khi_duoc_thuong_tien_vao_tai_khoan_ctv', compact('ho_ten'))->render());
                }

                DB::commit();

                // Gửi mail thông báo duyệt
                $ho_ten = $congTacVien->ho_va_ten;
                SendMail::send($congTacVien->email, 'Thông báo đã duyệt thành viên', view('email.thong_bao_duyet_ctv', compact('ho_ten'))->render());

                return return_message('toastr', 'success', 'Đã duyệt thành công!', true, route('admin.xac_thuc.index'));
            }

            DB::commit();

            // Gửi mail thông báo duyệt
            $ho_ten = $congTacVien->ho_va_ten;
            SendMail::send($congTacVien->email, 'Thông báo đã duyệt thành viên', view('email.thong_bao_duyet_ctv', compact('ho_ten'))->render());


            return return_message('toastr', 'success', 'ĐÃ DUYỆT THÀNH CÔNG!!!. Người dùng này đã đuợc trao thuởng. Tuy nhiên do Admin huỷ duyệt nên bây giờ không đuợc thuởng.');
        } catch (Exception $ex) {
            \Log::info($ex->getMessage());

            DB::rollback();

            return return_message('toastr', 'error', 'Có lỗi xảy ra');
        }
    }

    public function khongDuyet(Request $request, $hash, DestroyCongTacVienValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), ['txid' => $hash]);
        $validator->with($data)->passesOrFail();

        // Process
        $congTacVien = $this->congTacVien->findByTxid($hash);
        $congTacVien->is_kich_hoat      = CongTacVien::IS_KICH_HOAT['NOT_ALLOW'];
        $congTacVien->li_do_khong_duyet = $data['li_do_khong_duyet'];
        $congTacVien->save();

        if (empty($congTacVien->email_gioi_thieu)) {
            return return_message('toastr', 'success', trans('notification.edit.success'), true, route('admin.xac_thuc.index'));
        }

        $logThuongGioiThieu = $this->logThuongGioiThieu->kiemtraThuongGioiThieu($congTacVien);

        // Gửi mail thông báo duyệt
        $ho_ten = $congTacVien->ho_va_ten;
        $ly_do  = $data['li_do_khong_duyet'];
        SendMail::send($congTacVien->email, 'Thông báo huỷ duyệt thành viên', view('email.thong_bao_khong_duyet_ctv', compact('ho_ten', 'ly_do'))->render());

        if (!empty($logThuongGioiThieu)) {
            return return_message('toastr', 'success', 'ĐÃ HUỶ DUYỆT THÀNH CÔNG!!!. Người dùng này đã đuợc thưởng, tuy nhiên để đảm bảo hệ thống cho nên sẽ không trừ tiền thuởng. Lần sau nếu duyệt lại sẽ không đuợc cộng.', true, route('admin.xac_thuc.index'));
        }
        return return_message('toastr', 'success', trans('notification.edit.success'), true, route('admin.xac_thuc.index'));
    }

    public function getSearch(Request $request)
    {
        $search = $request->input_search;

        $congTacVien = $this->congTacVien->getChuaXacThucWithSearch($search, $this->paginate);

        return view('admin.xac_thuc.partials.body-table', compact('congTacVien'));
    }

    public function downExcel(Request $request)
    {
        $congTacVien = $this->congTacVien->getChuaXacThuc();
        $fileName = str_random() . '.xlsx';
        $path = storage_path($fileName);

        $spreadsheet = new Spreadsheet();

        $congTacVienNew[] = [
            '#', 'Họ và tên', 'Email', 'Ip đăng ký'
        ];
        $index = 1;
        foreach ($congTacVien as $items) {
            $congTacVienNew[] = [
                '#'             => $index,
                'Họ và tên'     => $items->ho_va_ten,
                'Email'         => $items->email,
                'Ip đăng ký'    => $items->ip_dang_ky,
            ];
            $index++;
        }

        $spreadsheet->getActiveSheet()->fromArray($congTacVienNew);
        $writer = new Xlsx($spreadsheet);
        ob_end_clean();
        $writer->save($path);

        $headers = [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'attachment;filename="' . $fileName . '"',
            'Cache-Control' => 'max-age=0',
        ];

        return response()->download($path, $fileName, $headers)->deleteFileAfterSend(true);
    }
}
