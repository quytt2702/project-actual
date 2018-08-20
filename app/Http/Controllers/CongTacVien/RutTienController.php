<?php

namespace App\Http\Controllers\CongTacVien;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\NganHangRepository;
use App\Repositories\Contracts\LogRutTienVNDRepository;
use App\Repositories\Contracts\TienNguoiDungRepository;

class RutTienController extends Controller
{
    protected $nganHang;
    protected $logRutTienVND;
    protected $tienNguoiDung;

    public function __construct(
        NganHangRepository $nganHang,
        LogRutTienVNDRepository $logRutTienVND,
        TienNguoiDungRepository $tienNguoiDung
    ) {
        $this->nganHang       = $nganHang;
        $this->logRutTienVND  = $logRutTienVND;
        $this->tienNguoiDung  = $tienNguoiDung;
    }

    public function index(Request $request)
    {
        $user = Auth::guard('cong_tac_vien')->user();
        $nganHang = $this->nganHang->findById($user->id_ngan_hang);
        $thongTinNganHang = 'Số tài khoản: ' . $user->so_tai_khoan . ' tại Ngân hàng: ' . $nganHang->ten_ngan_hang . ' , chi nhánh: ' . $user->ten_chi_nhanh . '. Người thụ hưởng: ' . $user->ten_chu_tai_khoan;

        return view('cong_tac_vien.rut_tien.index', compact('thongTinNganHang'));
    }

    public function table(Request $request)
    {
        $user = Auth::guard('cong_tac_vien')->user();
        $logRutTienVND = $this->logRutTienVND->getByEmail($user->email);

        return view('cong_tac_vien.rut_tien.partials.body-table', compact('logRutTienVND'));
    }

    public function rutTien(Request $request)
    {
        // Validate here
        $data = $request->all();
        $user = Auth::guard('cong_tac_vien')->user();
        $nganHang = $this->nganHang->findById($user->id_ngan_hang);
        $tienNguoiDung = $this->tienNguoiDung->findByEmail($user->email);

        if ($data['so_tien'] < 200000) {
            return return_message('toastr', 'error', 'Số tiền muốn rút thấp nhất phải là 200.000 VNĐ');
        } elseif ($data['so_tien'] > $tienNguoiDung->tong_tien_vnd) {
            return return_message('toastr', 'error', 'Bạn chỉ đuợc rút số tiền tối đa là: ' . $tienNguoiDung->tong_tien_vnd);
        } else {
            $nganHang = $this->nganHang->findById($user->id_ngan_hang);
            $thongTinNganHang = 'Số tài khoản: ' . $user->so_tai_khoan . ' tại Ngân hàng: ' . $nganHang->ten_ngan_hang . ' , chi nhánh: ' . $user->ten_chi_nhanh . '. Người thụ hưởng: ' . $user->ten_chu_tai_khoan;
            $logRutTienVND = $this->logRutTienVND->create([
                'email_rut_tien' => $user->email,
                'so_tien'        => $data['so_tien'],
                'tinh_trang'     => 'Pending',
                'ngan_hang'      => $thongTinNganHang,
                'thong_bao'      => 'Đang xử lý rút tiền về tài khoản!',
            ]);

            // Xử lý chuyển tiền từ root sang pending
            $tienNguoiDung->tong_tien_vnd =  $tienNguoiDung->tong_tien_vnd - $data['so_tien'];
            $tienNguoiDung->vnd_pending = $tienNguoiDung->vnd_pending + $data['so_tien'];
            $tienNguoiDung->save();

            return return_message('toastr', 'success', 'Bạn đã rút tiền thành công');
        }
    }

    public function huyBo(Request $request, $id)
    {
        // Validate here
        $user = Auth::guard('cong_tac_vien')->user();
        $logRutTienVND = $this->logRutTienVND->findById($id);

        if (!empty($logRutTienVND)) {
            $logRutTienVND->tinh_trang = 'Cancel';
            $logRutTienVND->thong_bao  = 'Tự huỷ bỏ lệnh vào ' . now();
            $logRutTienVND->save();
            // Xử lý hoàn tiền
            $tienNguoiDung = $this->tienNguoiDung->findByEmail($user->email);
            $tienNguoiDung->tong_tien_vnd =  $tienNguoiDung->tong_tien_vnd + $logRutTienVND->so_tien;
            $tienNguoiDung->vnd_pending = $tienNguoiDung->vnd_pending - $logRutTienVND->so_tien;
            $tienNguoiDung->save();

            return return_message('toastr', 'success', 'Đã huỷ bỏ, và hoàn: ' . number_format($logRutTienVND->so_tien) . 'VND vào tài khoản!');
        }
    }
}
