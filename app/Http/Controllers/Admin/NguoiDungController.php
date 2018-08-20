<?php

namespace App\Http\Controllers\Admin;

use Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Entities\NguoiDung;
use App\Repositories\Contracts\NganHangRepository;
use App\Repositories\Contracts\NhomQuyenRepository;
use App\Repositories\Contracts\NguoiDungRepository;
use App\Validators\Admin\NguoiDung\StoreNguoiDungValidator;
use App\Validators\Admin\NguoiDung\UpdateNguoiDungValidator;
use App\Validators\Admin\NguoiDung\DestroyNguoiDungValidator;

class NguoiDungController extends Controller
{
    protected $nganHang;
    protected $nhomQuyen;
    protected $nguoiDung;
    protected $paginate = 10;

    public function __construct(
        NganHangRepository $nganHang,
        NhomQuyenRepository $nhomQuyen,
        NguoiDungRepository $nguoiDung
    ) {
        $this->nganHang = $nganHang;
        $this->nhomQuyen = $nhomQuyen;
        $this->nguoiDung = $nguoiDung;
    }

    public function index(Request $request)
    {
        return view('admin.nguoi_dung.index');
    }

    public function table(Request $request)
    {
        $nguoi_dung = $this->nguoiDung->allWithNhomQuyenNganHang($this->paginate);

        return view('admin.nguoi_dung.partials.body-table', compact('nguoi_dung'));
    }

    public function show(Request $request, $txid)
    {
        // Validate
        // Process
        $nganHang = $this->nganHang->all();
        $nhomQuyen = $this->nhomQuyen->all();
        $nguoi_dung = $this->nguoiDung->findByTxidWithNhomQuyenNganHang($txid);

        return view('admin.nguoi_dung.show', compact('nguoi_dung', 'nganHang', 'nhomQuyen'));
    }

    public function edit(Request $request, $txid)
    {
        // Validate
        // Process
        $nganHang = $this->nganHang->all();
        $nhomQuyen = $this->nhomQuyen->all();
        $nguoi_dung = $this->nguoiDung->findByTxidWithNhomQuyenNganHang($txid);

        return view('admin.nguoi_dung.edit', compact('nguoi_dung', 'nganHang', 'nhomQuyen'));
    }

    public function update(Request $request, $txid, UpdateNguoiDungValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();
        // Process
        $nguoi_dung = $this->nguoiDung->findByTxid($txid);
        $nguoi_dung->cmnd               = $data['cmnd'];
        $nguoi_dung->dia_chi_cmnd       = $data['dia_chi_cmnd'];
        $nguoi_dung->dia_chi_hien_tai   = $data['dia_chi_hien_tai'];
        $nguoi_dung->facebook           = $data['facebook'];
        $nguoi_dung->gioi_tinh          = $data['gioi_tinh'];
        $nguoi_dung->ho_va_ten          = $data['ho_va_ten'];
        $nguoi_dung->id_ngan_hang       = $data['id_ngan_hang'];
        $nguoi_dung->id_nhom_quyen      = $data['id_nhom_quyen'];
        $nguoi_dung->ngay_sinh          = $data['ngay_sinh'];
        $nguoi_dung->sdt                = $data['sdt'];
        $nguoi_dung->so_tai_khoan       = $data['so_tai_khoan'];
        $nguoi_dung->ten_chi_nhanh      = $data['ten_chi_nhanh'];
        $nguoi_dung->ten_chu_tai_khoan  = $data['ten_chu_tai_khoan'];

        if (! empty($data['password'])) {
            $nguoi_dung->password = bcrypt($data['password']);
        }

        $nguoi_dung->save();

        return return_message('toastr', 'success', trans('notification.edit.success'), true, route('admin.nguoi_dung.index'));
    }

    public function add(Request $request)
    {
        $nganHang = $this->nganHang->all();
        $nhomQuyen = $this->nhomQuyen->all();

        return view('admin.nguoi_dung.store', compact('nganHang', 'nhomQuyen'));
    }

    public function store(Request $request, StoreNguoiDungValidator $validator)
    {
        // Validate
        $data = array_merge($request->all());
        // dd($data);
        $validator->with($data)->passesOrFail();

        // Process
        $data['gioi_tinh']      = vn_to_en($data['gioi_tinh']);
        $data['password']       = bcrypt($data['password']);
        $data['txid']           = Uuid::generate(4)->string;
        $data['is_kich_hoat']   = NguoiDung::IS_KICH_HOAT['DONE'];

        $this->nguoiDung->create($data);

        return return_message('toastr', 'success', trans('notification.add.success'), true, route('admin.nguoi_dung.index'));
    }

    public function destroy(Request $request, $txid, DestroyNguoiDungValidator $validator)
    {
        // Validate
        $data['txid'] = $txid;
        $validator->with($data)->passesOrFail();

        // Process
        $nguoi_dung = $this->nguoiDung->findByTxid($txid);
        $nguoi_dung->is_delete = NguoiDung::IS_DELETE['YES'];
        $nguoi_dung->save();

        return return_message('toastr', 'success', trans('notification.delete.success'));
    }

    public function getSearch(Request $request)
    {
        $search = $request->input_search;

        $nguoi_dung = $this->nguoiDung->allWithNhomQuyenNganHangWithSearch($search, $this->paginate);

        return view('admin.nguoi_dung.partials.body-table', compact('nguoi_dung'));
    }

    public function downExcel(Request $request)
    {
        $nguoi_dung = $this->nguoiDung->allWithNhomQuyenNganHang();
        $fileName = str_random() . '.xlsx';
        $path = storage_path($fileName);

        $spreadsheet = new Spreadsheet();

        $nguoiDungNew[] = [
            '#', 'Họ và tên', 'Địa chỉ', 'Số tài khoản', 'Ngân hàng', 'Chi nhánh', 'Nhóm quyền'
        ];
        $index = 1;
        foreach ($nguoi_dung as $items) {
            $nguoiDungNew[] = [
                '#'             => $index,
                'Họ và tên'     => $items->ho_va_ten,
                'Địa chỉ'        => $items->dia_chi_hien_tai,
                'Số tài khoản'  => $items->so_tai_khoan,
                'Ngân hàng'     => $items->ten_ngan_hang,
                'Chi nhánh'     => $items->ten_chi_nhanh,
                'Nhóm quyền'    => $items->ten_nhom,
            ];
            $index++;
        }

        $spreadsheet->getActiveSheet()->fromArray($nguoiDungNew);
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
