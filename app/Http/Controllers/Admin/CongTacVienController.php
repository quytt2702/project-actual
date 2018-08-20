<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Entities\CongTacVien;
use App\Repositories\Contracts\NganHangRepository;
use App\Repositories\Contracts\NhomQuyenRepository;
use App\Validators\Admin\ThongKe\CTVTichCucValidator;
use App\Repositories\Contracts\CongTacVienRepository;
use App\Validators\Admin\CongTacVien\UpdateCongTacVienValidator;
use App\Validators\Admin\CongTacVien\DestroyCongTacVienValidator;

class CongTacVienController extends Controller
{
    protected $nganHang;
    protected $nhomQuyen;
    protected $congTacVien;
    protected $paginate = 10;

    public function __construct(
        NganHangRepository $nganHang,
        NhomQuyenRepository $nhomQuyen,
        CongTacVienRepository $congTacVien
    ) {
        $this->nganHang = $nganHang;
        $this->nhomQuyen = $nhomQuyen;
        $this->congTacVien = $congTacVien;
    }

    public function index(Request $request)
    {
        return view('admin.cong_tac_vien.index');
    }

    public function table(Request $request)
    {
        $congTacVien = $this->congTacVien->allWithNhomQuyenNganHang($this->paginate);

        return view('admin.cong_tac_vien.partials.body-table', compact('congTacVien'));
    }

    public function show(Request $request, $txid, DestroyCongTacVienValidator $validator)
    {
        // Validate
        $data['txid'] = $txid;
        $validator->with($data)->passesOrFail();

        // Process
        $nganHang = $this->nganHang->all();
        $nhomQuyen = $this->nhomQuyen->all();
        $congTacVien = $this->congTacVien->findByTxidWithNhomQuyenNganHang($txid);

        return view('admin.cong_tac_vien.show', compact('congTacVien', 'nganHang', 'nhomQuyen'));
    }

    public function login(Request $request, $hash)
    {
        $congTacVien = $this->congTacVien->findByTxid($hash);
        Auth::guard('cong_tac_vien')->login($congTacVien);
        // Auth::login($congTacVien, true);
        return redirect()->route('cong_tac_vien.ho_so.index');
    }

    public function thongKeThuNhap()
    {
        return view('admin.cong_tac_vien.thong_ke_thu_nhap');
    }

    public function tableThongKeThuNhap($thang, $nam, CTVTichCucValidator $validator)
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

        $congTacVien = $this->congTacVien->thongKeThuNhapTheoThangNam($thang, $nam, $this->paginate);

        return view('admin.cong_tac_vien.partials.table_thong_ke_thu_nhap', compact('congTacVien'));
    }

    public function edit(Request $request, $txid, DestroyCongTacVienValidator $validator)
    {
        // Validate
        $data['txid'] = $txid;
        $validator->with($data)->passesOrFail();

        // Process
        $nganHang = $this->nganHang->all();
        $nhomQuyen = $this->nhomQuyen->all();
        $congTacVien = $this->congTacVien->findByTxidWithNhomQuyenNganHang($txid);

        return view('admin.cong_tac_vien.edit', compact('congTacVien', 'nganHang', 'nhomQuyen'));
    }

    public function update(Request $request, $txid, UpdateCongTacVienValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $congTacVien = $this->congTacVien->findByTxid($txid);
        $congTacVien->cmnd               = $data['cmnd'];
        $congTacVien->dia_chi_cmnd       = $data['dia_chi_cmnd'];
        $congTacVien->dia_chi_hien_tai   = $data['dia_chi_hien_tai'];
        $congTacVien->facebook           = $data['facebook'];
        $congTacVien->gioi_tinh          = $data['gioi_tinh'];
        $congTacVien->ho_va_ten          = $data['ho_va_ten'];
        $congTacVien->id_ngan_hang       = $data['id_ngan_hang'];
        $congTacVien->ngay_sinh          = $data['ngay_sinh'];
        $congTacVien->so_dien_thoai      = $data['so_dien_thoai'];
        $congTacVien->so_tai_khoan       = $data['so_tai_khoan'];
        $congTacVien->ten_chi_nhanh      = $data['ten_chi_nhanh'];
        $congTacVien->ten_chu_tai_khoan  = $data['ten_chu_tai_khoan'];

        if (! empty($data['password'])) {
            $congTacVien->password = bcrypt($data['password']);
        }

        $congTacVien->save();

        return return_message('toastr', 'success', trans('notification.edit.success'), true, route('admin.cong_tac_vien.index'));
    }

    public function destroy(Request $request, $txid, DestroyCongTacVienValidator $validator)
    {
        // Validate
        $data['txid'] = $txid;
        $validator->with($data)->passesOrFail();

        // Process
        $congTacVien = $this->congTacVien->findByTxid($txid);
        $congTacVien->is_delete = CongTacVien::IS_DELETE['YES'];
        $congTacVien->save();

        return return_message('toastr', 'success', trans('notification.delete.success'));
    }

    public function block(Request $request, $hash, DestroyCongTacVienValidator $validator)
    {
        // Validate
        $data['txid'] = $hash;
        $validator->with($data)->passesOrFail();

        // Process
        $congTacVien = $this->congTacVien->findByTxid($hash);

        if ($congTacVien->is_block === CongTacVien::IS_BLOCK['YES']) {
            $congTacVien->is_block = CongTacVien::IS_BLOCK['NO'];
        } else {
            $congTacVien->is_block = CongTacVien::IS_BLOCK['YES'];
        }

        $congTacVien->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }

    public function getSearch(Request $request)
    {
        $search = $request->input_search;

        $congTacVien = $this->congTacVien->allWithNhomQuyenNganHangWithSearch($search, $this->paginate);

        return view('admin.cong_tac_vien.partials.body-table', compact('congTacVien'));
    }

    public function downExcel(Request $request)
    {
        $congTacVien = $this->congTacVien->allWithNhomQuyenNganHang();
        $fileName = 'CongTacVien.xlsx';
        $path = storage_path($fileName);

        $spreadsheet = new Spreadsheet();

        $congTacVienNew[] = [
            '#', 'Họ và tên', 'Địa chỉ', 'Số tài khoản', 'Ngân hàng', 'Chi nhánh'
        ];
        $index = 1;
        foreach ($congTacVien as $items) {
            $congTacVienNew[] = [
                '#'             => $index,
                'Họ và tên'     => $items->ho_va_ten,
                'Địa chỉ'       => $items->dia_chi_hien_tai,
                'Số tài khoản'  => $items->so_tai_khoan,
                'Ngân hàng'     => $items->ten_ngan_hang,
                'chi nhánh'     => $items->ten_chi_nhanh,
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
