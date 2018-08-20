<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\LogRutTienVNDRepository;
use App\Repositories\Contracts\TienNguoiDungRepository;

class QuanLyRutTienController extends Controller
{
    protected $logRutTien;
    protected $tienNguoiDung;

    public function __construct(
        LogRutTienVNDRepository $logRutTien,
        TienNguoiDungRepository $tienNguoiDung
    ) {
        $this->logRutTien = $logRutTien;
        $this->tienNguoiDung = $tienNguoiDung;
    }

    public function index(Request $request)
    {
        return view('admin.quan_ly_rut_tien.index');
    }

    public function table(Request $request, $tinh_trang)
    {
        if ($tinh_trang == 1) {
            $logRutTien = $this->logRutTien->logRutTienGetPending();
        } elseif ($tinh_trang == 2) {
            $logRutTien = $this->logRutTien->logRutTienGetSuccess();
        } elseif ($tinh_trang == 3) {
            $logRutTien = $this->logRutTien->logRutTienGetCancel();
        } else {
            return return_message('toastr', 'error', 'Không được can thiệp hệ thống!');
        }

        return view('admin.quan_ly_rut_tien.partials.quan_ly_rut_tien_table', compact('logRutTien'));
    }

    public function getHuyBoModal(Request $request, $id)
    {
        return view('admin.quan_ly_rut_tien.partials.confirm_modal', compact('id'));
    }

    public function huyBo(Request $request, $id)
    {
        $data = $request->all();

        $logRutTien = $this->logRutTien->findById($id);

        if (!empty($logRutTien)) {
            $logRutTien->tinh_trang = 'Admin Cancel';
            $logRutTien->thong_bao  = 'Admin huỷ vì: ' . $data['ly_do'];
            $logRutTien->save();
            // Xử lý hoàn tiền
            $tienNguoiDung = $this->tienNguoiDung->findByEmail($logRutTien->email_rut_tien);
            $tienNguoiDung->tong_tien_vnd =  $tienNguoiDung->tong_tien_vnd + $logRutTien->so_tien;
            $tienNguoiDung->vnd_pending   = $tienNguoiDung->vnd_pending - $logRutTien->so_tien;
            $tienNguoiDung->save();

            return return_message('toastr', 'success', 'Đã huỷ bỏ thành công!123');
        }
    }

    public function dongY(Request $request, $id)
    {
        // Validate here
        $logRutTien = $this->logRutTien->findById($id);

        if (!empty($logRutTien)) {
            $logRutTien->tinh_trang = 'Success';
            $logRutTien->thong_bao  = 'Admin đã chuyển khoản: ' . now();
            $logRutTien->save();

            return return_message('toastr', 'success', 'Đã xác nhận thành công!');
        }
    }
}
