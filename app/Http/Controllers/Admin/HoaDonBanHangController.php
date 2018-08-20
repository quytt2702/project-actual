<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Jobs\SendMail;
use App\Entities\HoaDonBanHang;
use App\Entities\LogThuongDonHang;
use App\Repositories\Contracts\SanPhamRepository;
use App\Repositories\Contracts\KhachHangRepository;
use App\Repositories\Contracts\CongTacVienRepository;
use App\Repositories\Contracts\Admin\CaiDatRepository;
use App\Repositories\Contracts\HoaDonBanHangRepository;
use App\Repositories\Contracts\TienNguoiDungRepository;
use App\Repositories\Contracts\LogThuongDonHangRepository;
use App\Repositories\Contracts\ChiTietHoaDonBanSanPhamRepository;
use App\Validators\Admin\HoaDonBanHang\DestroyHoaDonBanHangValidator;

class HoaDonBanHangController extends Controller
{
    protected $caiDat;
    protected $sanPham;
    protected $khachHang;
    protected $congTacVien;
    protected $hoaDonBanHang;
    protected $tienNguoiDung;
    protected $logThuongDonHang;
    protected $chiTietHoaDonBanSanPham;
    protected $phuongThucVanChuyen = [
        'VN POST', 'VIETTEL POST', 'GIAO HÀNG NHANH',
        'NASCO EXPRESS', 'GIAO HÀNG TIẾT KIỆM',
    ];

    public function __construct(
        CaiDatRepository $caiDat,
        SanPhamRepository $sanPham,
        KhachHangRepository $khachHang,
        CongTacVienRepository $congTacVien,
        TienNguoiDungRepository $tienNguoiDung,
        HoaDonBanHangRepository $hoaDonBanHang,
        LogThuongDonHangRepository $logThuongDonHang,
        ChiTietHoaDonBanSanPhamRepository $chiTietHoaDonBanSanPham
    ) {
        $this->caiDat                   = $caiDat;
        $this->sanPham                  = $sanPham;
        $this->khachHang                = $khachHang;
        $this->congTacVien              = $congTacVien;
        $this->tienNguoiDung            = $tienNguoiDung;
        $this->hoaDonBanHang            = $hoaDonBanHang;
        $this->logThuongDonHang         = $logThuongDonHang;
        $this->chiTietHoaDonBanSanPham  = $chiTietHoaDonBanSanPham;
    }

    public function congTacVien(Request $request)
    {
        return view('admin.hoa_don_ban_hang.cong_tac_vien');
    }

    public function getCongTacVienTable(Request $request)
    {
        $hoaDonBanHang = $this->hoaDonBanHang->getByCTV();

        return view('admin.hoa_don_ban_hang.partials.hoa_don_table', compact('hoaDonBanHang'));
    }

    public function chuaGiaoHang()
    {
        return view('admin.hoa_don_ban_hang.chua_giao_hang');
    }

    public function getChuaGiaoHangTable(Request $request)
    {
        $hoaDonBanHang = $this->hoaDonBanHang->chuaGiaoHang();

        return view('admin.hoa_don_ban_hang.partials.hoa_don_table', compact('hoaDonBanHang'));
    }

    public function COD()
    {
        return view('admin.hoa_don_ban_hang.cod');
    }

    public function getCODTable()
    {
        $hoaDonBanHang = $this->hoaDonBanHang->getByCOD();

        return view('admin.hoa_don_ban_hang.partials.hoa_don_table', compact('hoaDonBanHang'));
    }

    public function thucHienThanhCong()
    {
        return view('admin.hoa_don_ban_hang.thuc_hien_thanh_cong');
    }

    public function getThucHienThanhCongTable()
    {
        $hoaDonBanHang = $this->hoaDonBanHang->thucHienThanhCong();

        return view('admin.hoa_don_ban_hang.partials.hoa_don_table', compact('hoaDonBanHang'));
    }

    public function dangVanChuyen()
    {
        return view('admin.hoa_don_ban_hang.dang_van_chuyen');
    }

    public function getDangVanChuyenTable()
    {
        $hoaDonBanHang = $this->hoaDonBanHang->dangVanChuyen();

        return view('admin.hoa_don_ban_hang.partials.hoa_don_table', compact('hoaDonBanHang'));
    }

    public function daBiHuyVaHoanKho()
    {
        return view('admin.hoa_don_ban_hang.da_bi_huy_va_hoan_kho');
    }

    public function getDaBiHuyVaHoanKhoTable()
    {
        $hoaDonBanHang = $this->hoaDonBanHang->daBiHuyVaHoanKho();

        return view('admin.hoa_don_ban_hang.partials.hoa_don_table', compact('hoaDonBanHang'));
    }

    public function adminHuyGiaoHang()
    {
        return view('admin.hoa_don_ban_hang.admin_huy_giao_hang');
    }

    public function adminHuyGiaoHangTable()
    {
        $hoaDonBanHang = $this->hoaDonBanHang->adminHuyGiaoHang();

        return view('admin.hoa_don_ban_hang.partials.hoa_don_admin_huy_giao_table', compact('hoaDonBanHang'));
    }

    public function getTrangThai(Request $request, $id, DestroyHoaDonBanHangValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        $hoaDonBanHang = $this->hoaDonBanHang->findByIdWithKhachHang($id);

        if (empty($hoaDonBanHang)) {
            return return_error('Có lỗi xảy ra');
        }

        if ($hoaDonBanHang->trang_thai === HoaDonBanHang::TRANG_THAI['CHUA_THANH_TOAN'] ||
            $hoaDonBanHang->trang_thai === HoaDonBanHang::TRANG_THAI['DA_THANH_TOAN'] ||
            $hoaDonBanHang->trang_thai === HoaDonBanHang::TRANG_THAI['GIAO_KHONG_DUOC']) {
            $phuongThucVanChuyen = $this->phuongThucVanChuyen;

            return view('admin.hoa_don_ban_hang.partials.modals.giao_hang', compact('id', 'phuongThucVanChuyen', 'hoaDonBanHang'));
        } elseif ($hoaDonBanHang->trang_thai === HoaDonBanHang::TRANG_THAI['DANG_VAN_CHUYEN']) {
            return view('admin.hoa_don_ban_hang.partials.modals.bi_huy', compact('id', 'hoaDonBanHang'));
        }
    }

    public function thayDoiTrangThai(Request $request, $id, $chon, DestroyHoaDonBanHangValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        $hoaDonBanHang = $this->hoaDonBanHang->findById($id);
        $user = Auth::guard('admin')->user();

        if ($hoaDonBanHang->trang_thai === HoaDonBanHang::TRANG_THAI['CHUA_THANH_TOAN'] ||
            $hoaDonBanHang->trang_thai === HoaDonBanHang::TRANG_THAI['DA_THANH_TOAN']) {
            $phuongThucVanChuyen = $this->phuongThucVanChuyen;

            return view('admin.hoa_don_ban_hang.partials.modals.giao_hang', compact('code', 'phuongThucVanChuyen'));
        } elseif ($hoaDonBanHang->trang_thai === HoaDonBanHang::TRANG_THAI['DANG_VAN_CHUYEN']) {
            return $this->biHuyGiaoHang($hoaDonBanHang, $chon, $user, $data['ly_do']);
        }
    }

    public function biHuyGiaoHang($hoaDonBanHang, $chon, $user, $ly_do = null)
    {
        $user = Auth::guard('admin')->user();

        DB::beginTransaction();

        try {
            if ($chon == 2) {
                $hoaDonBanHang->trang_thai     = HoaDonBanHang::TRANG_THAI['GIAO_KHONG_DUOC'];
                $hoaDonBanHang->email_cap_nhat = $user->email;
                $hoaDonBanHang->ghi_chu        = $ly_do;
                $hoaDonBanHang->save();

                // Hoàn sản phẩm về kho
                $chiTietHoaDonBanSanPham = $this->chiTietHoaDonBanSanPham->getByIdHoaDonBanHang($hoaDonBanHang->id);
                if (!empty($chiTietHoaDonBanSanPham)) {
                    foreach ($chiTietHoaDonBanSanPham as $item) {
                        $sanPham = $this->sanPham->findById($item->id_san_pham);
                        $sanPham->san_pham_so_luong = $sanPham->san_pham_so_luong + $item->so_luong;
                        $sanPham->save();
                    }
                }

                DB::commit();

                return return_message('toastr', 'success', 'Thực hiện thành công');
            } elseif ($chon == 1) {
                // Nếu trạng thái là khác [Đang vận chuyển] chuyển qua trạng thái [Thực hiện thành công] thì trừ kho
                if ($hoaDonBanHang->trang_thai === HoaDonBanHang::TRANG_THAI['CHUA_THANH_TOAN'] || $hoaDonBanHang->trang_thai === HoaDonBanHang::TRANG_THAI['DA_THANH_TOAN'] || $hoaDonBanHang->trang_thai === HoaDonBanHang::TRANG_THAI['GIAO_KHONG_DUOC']) {
                    // Trừ sản phẩm trong kho
                    $danhSachSanPhamKhongDu = '';
                    $chiTietHoaDonBanSanPham = $this->chiTietHoaDonBanSanPham->getByIdHoaDonBanHang($hoaDonBanHang->id);
                    if (!empty($chiTietHoaDonBanSanPham)) {
                        foreach ($chiTietHoaDonBanSanPham as $item) {
                            $sanPham = $this->sanPham->findById($item->id_san_pham);
                            if ($sanPham->san_pham_so_luong >= $item->so_luong) {
                                $sanPham->san_pham_so_luong = $sanPham->san_pham_so_luong + $item->so_luong;
                                $sanPham->save();
                            } else {
                                $danhSachSanPhamKhongDu .= $sanPham->san_pham_ten . ', trong kho chỉ còn ' . $sanPham->san_pham_so_luong . ' sản phẩm. ';
                            }
                        }
                    }

                    if (!empty($list)) {
                        return return_error('Không thể vì số luợng trong kho không đủ. ' . substr($danhSachSanPhamKhongDu, 0, strlen($danhSachSanPhamKhongDu) - 2));
                    }
                    // Kết thúc trừ sản phẩm trong kho
                }

                $hoaDonBanHang->trang_thai      = HoaDonBanHang::TRANG_THAI['THUC_HIEN_THANH_CONG'];
                $hoaDonBanHang->email_cap_nhat  = $user->email;
                $hoaDonBanHang->ghi_chu         = '';
                $hoaDonBanHang->save();

                $so_tien_mua = $hoaDonBanHang->so_tien_mua;

                $khachHangMua = $this->khachHang->findByEmailVaSdtNotOffline($hoaDonBanHang->email_khach_hang_mua, $hoaDonBanHang->sdt_khach_hang_mua);
                $kiemTraThuongLog = $this->logThuongDonHang->findKiemTraDonHangDaThuong($hoaDonBanHang->id);
                if (empty($kiemTraThuongLog)) {
                    // Cộng hoa hồng cho cộng tác viên mức 1
                    $congTacVien = $this->congTacVien->findByEmail($hoaDonBanHang->email_cong_tac_vien);
                    $tienNguoiDung = null;
                    $caiDat = $this->caiDat->getConfig();

                    if (!empty($congTacVien)) {
                        $tienNguoiDung  = $this->tienNguoiDung->findByEmail($congTacVien->email);
                        if (!empty($khachHangMua) && !empty($tienNguoiDung)) {
                            // Nếu là CTV COD thì không thuởng mức 1 và chuyển tiền về đúng số tiền của nó
                            $so_tien_duoc_thuong = $hoaDonBanHang->so_tien_mua * $caiDat->phan_tram_thuong_doanh_thu_cap_1 / 100;
                            if ($hoaDonBanHang->loai_thanh_toan == 'CTV COD') {
                                $so_tien_mua = $hoaDonBanHang->so_tien_mua * 100 / 85; //tính lại số tiền chưa chiết khấu
                                $so_tien_duoc_thuong = 0;
                            }
                            $logThuongDonHang = $this->logThuongDonHang->create([
                                'id_nguoi_duoc_thuong'   => $congTacVien->id,
                                'ten_nguoi_duoc_thuong'  => $congTacVien->email,
                                'id_don_hang'            => $hoaDonBanHang->id,
                                'so_tien_mua_don_hang'   => $so_tien_mua,
                                'phan_tram_duoc_thuong'  => $caiDat->phan_tram_thuong_doanh_thu_cap_1 / 100,
                                'ten_khach_hang_mua'     => $khachHangMua->ho_ten,
                                'sdt_khach_hang_mua'     => $khachHangMua->sdt,
                                'email_khach_hang_mua'   => $khachHangMua->email,
                                'so_tien_duoc_thuong'    => $so_tien_duoc_thuong,
                                'hash'                   => $hoaDonBanHang->hash,
                                'cap_thuong'             => LogThuongDonHang::CAP_THUONG[1],
                            ]);

                            // Thực hiện việc thưởng tiền
                            if (!empty($tienNguoiDung)) {
                                $tienNguoiDung->thuong_hoa_hong_muc_1   = $tienNguoiDung->thuong_hoa_hong_muc_1 + $logThuongDonHang->so_tien_duoc_thuong;
                                $tienNguoiDung->tong_tien_vnd           = $tienNguoiDung->tong_tien_vnd + $logThuongDonHang->so_tien_duoc_thuong;
                                $tienNguoiDung->save();

                                // quoclong_gui_email_3
                                $ho_ten = $congTacVien->ho_va_ten;
                                SendMail::send($congTacVien->email, 'Thông báo thưởng tiền', view('email.thong_bao_khi_duoc_thuong_tien_vao_tai_khoan_ctv', compact('ho_ten'))->render());
                            }
                        }
                    }
                    // Thực hiện việc thưởng tiền cũ (Move logic vào trong if)
                    // Cộng hoa hồng cho cộng tác viên mức 2
                    if (!empty($congTacVien)) {
                        $emailCap2 = $congTacVien->email_gioi_thieu;
                        $congTacVienCap2 =  $this->congTacVien->findByEmail($emailCap2);
                        $tienNguoiDung  = $this->tienNguoiDung->findByEmail($emailCap2);
                        if ($hoaDonBanHang->loai_thanh_toan == 'CTV COD') {
                            $so_tien_mua = $hoaDonBanHang->so_tien_mua * 100 / 85; //tính lại số tiền chưa chiết khấu
                        }
                        if (!empty($congTacVienCap2) && !empty($tienNguoiDung) && !empty($khachHangMua)) {
                            $logThuongDonHangCap2 = $this->logThuongDonHang->create([
                                'id_nguoi_duoc_thuong'   => $congTacVienCap2->id,
                                'ten_nguoi_duoc_thuong'  => $congTacVienCap2->email,
                                'id_don_hang'            => $hoaDonBanHang->id,
                                'so_tien_mua_don_hang'   => $so_tien_mua,
                                'phan_tram_duoc_thuong'  => $caiDat->phan_tram_thuong_doanh_thu_cap_2 / 100,
                                'ten_khach_hang_mua'     => $khachHangMua->ho_ten,
                                'sdt_khach_hang_mua'     => $khachHangMua->sdt,
                                'email_khach_hang_mua'   => $khachHangMua->email,
                                'so_tien_duoc_thuong'    => $so_tien_mua * $caiDat->phan_tram_thuong_doanh_thu_cap_2 / 100,
                                'hash'                   => $hoaDonBanHang->hash,
                                'cap_thuong'             => LogThuongDonHang::CAP_THUONG[2],
                            ]);
                            // Thực hiện việc thưởng tiền
                            $tienNguoiDung->thuong_hoa_hong_muc_2   = $tienNguoiDung->thuong_hoa_hong_muc_2 + $logThuongDonHangCap2->so_tien_duoc_thuong;
                            $tienNguoiDung->tong_tien_vnd           = $tienNguoiDung->tong_tien_vnd + $logThuongDonHangCap2->so_tien_duoc_thuong;
                            $tienNguoiDung->save();

                            // quoclong_gui_email_3
                            $ho_ten = $congTacVienCap2->ho_va_ten;
                            SendMail::send($congTacVienCap2->email, 'Thông báo thưởng tiền', view('email.thong_bao_khi_duoc_thuong_tien_vao_tai_khoan_ctv', compact('ho_ten'))->render());
                        }
                    }
                }

                DB::commit();

                return return_message('toastr', 'success', 'Thực hiện thành công');
            }
        } catch (Exception $ex) {
            \Log::error($ex->getMessage() . PHP_EOL . $ex->getTraceAsString());

            DB::rollback();
        }
    }

    public function xacNhanGiaoHang(Request $request, $id)
    {
        // Validate here
        $hoaDonBanHang = $this->hoaDonBanHang->findById($id);
        $user = Auth::guard('admin')->user();
        $data = $request->all();
        DB::beginTransaction();
        try {
            if ($hoaDonBanHang->trang_thai === HoaDonBanHang::TRANG_THAI['CHUA_THANH_TOAN'] || $hoaDonBanHang->trang_thai === HoaDonBanHang::TRANG_THAI['DA_THANH_TOAN'] || $hoaDonBanHang->trang_thai === HoaDonBanHang::TRANG_THAI['GIAO_KHONG_DUOC']) {
                if ($data['phuong_thuc_van_chuyen'] == '2') {
                    $tracking_link = 'Chưa hỗ trợ tracking';
                    if ($data['don_vi_van_chuyen'] == 'VN POST') {
                        $tracking_link = 'http://www.vnpost.vn/vi-vn/dinh-vi/buu-pham?key=' . $data['ma_van_don'];
                    } elseif ($data['don_vi_van_chuyen'] == 'VIETTEL POST') {
                        $tracking_link = 'https://www.viettelpost.com.vn/Tracking?KEY=' . $data['ma_van_don'];
                    } elseif ($data['don_vi_van_chuyen'] == 'GIAO HÀNG NHANH') {
                        $tracking_link = 'https://track.ghn.vn/order/tracking?code=' . $data['ma_van_don'];
                    } elseif ($data['don_vi_van_chuyen'] == 'NASCO EXPRESS') {
                        $tracking_link = 'https://nascoexpress.com/tra-cuu-van-don.html?s=' . $data['ma_van_don'];
                    }

                    $hoaDonBanHang->ma_van_don          = $data['ma_van_don'];
                    $hoaDonBanHang->loai_van_don        = $data['don_vi_van_chuyen'];
                    $hoaDonBanHang->tracking_link       = $tracking_link;
                    $hoaDonBanHang->email_cap_nhat      = $user->email;
                    $hoaDonBanHang->trang_thai          = HoaDonBanHang::TRANG_THAI['DANG_VAN_CHUYEN'];
                    $hoaDonBanHang->save();

                    // Danh sách sản phẩm không đủ để bán.
                    $danhSachSanPhamKhongDu = '';
                    // Bắt đầu trừ sản phẩm trong kho
                    $danhSachSanPhamMua = $this->chiTietHoaDonBanSanPham->getByIdHoaDonBanHang($hoaDonBanHang->id);
                    foreach ($danhSachSanPhamMua as $item) {
                        $sanPham = $this->sanPham->findById($item->id_san_pham);
                        // san_pham_so_luong: là số luơng sản phẩm còn trong kho
                        // item->so_luong: là số luợng sản phẩm khách hàng mua
                        if (!empty($sanPham) && $sanPham->san_pham_so_luong >= $item->so_luong) {
                            // Đủ sản phẩm để bán
                            $sanPham->san_pham_so_luong = $sanPham->san_pham_so_luong - $item->so_luong;
                            $sanPham->save();
                        } else {
                            $danhSachSanPhamKhongDu .= $sanPham->san_pham_ten . ', trong kho chỉ còn ' . $sanPham->san_pham_so_luong . ' sản phẩm. ';
                        }
                    }


                    if (empty($danhSachSanPhamKhongDu)) {
                        DB::commit();

                        return return_message('toastr', 'success', 'Thành công');
                    } else {
                        return return_message('toastr', 'error', 'Không thể vì số luợng trong kho không đủ. ' . substr($danhSachSanPhamKhongDu, 0, strlen($danhSachSanPhamKhongDu) - 2));
                    }
                } elseif ($data['phuong_thuc_van_chuyen'] == '1') {
                    $hoaDonBanHang->trang_thai      = HoaDonBanHang::TRANG_THAI['THUC_HIEN_THANH_CONG'];
                    $hoaDonBanHang->email_cap_nhat  = $user->email;
                    $hoaDonBanHang->ghi_chu         = '';
                    $hoaDonBanHang->save();

                    // Danh sách sản phẩm không đủ để bán.
                    $danhSachSanPhamKhongDu = '';
                        // Bắt đầu trừ sản phẩm trong kho
                    $danhSachSanPhamMua = $this->chiTietHoaDonBanSanPham->getByIdHoaDonBanHang($hoaDonBanHang->id);
                    foreach ($danhSachSanPhamMua as $item) {
                        $sanPham = $this->sanPham->findById($item->id_san_pham);
                        // san_pham_so_luong: là số luơng sản phẩm còn trong kho
                        // item->so_luong: là số luợng sản phẩm khách hàng mua
                        if (!empty($sanPham) && $sanPham->san_pham_so_luong >= $item->so_luong) {
                            // Đủ sản phẩm để bán
                            $sanPham->san_pham_so_luong = $sanPham->san_pham_so_luong - $item->so_luong;
                            $sanPham->save();
                        } else {
                            $danhSachSanPhamKhongDu .= $sanPham->san_pham_ten . ', trong kho chỉ còn ' . $sanPham->san_pham_so_luong . ' sản phẩm. ';
                        }
                    }

                    if (!empty($danhSachSanPhamKhongDu)) {
                        return return_message('toastr', 'error', 'Không thể vì số luợng trong kho không đủ. ' . substr($danhSachSanPhamKhongDu, 0, strlen($danhSachSanPhamKhongDu) - 2));
                    }

                    $khachHangMua = $this->khachHang->findByEmailVaSdtNotOffline($hoaDonBanHang->email_khach_hang_mua, $hoaDonBanHang->sdt_khach_hang_mua);
                    $kiemTraThuongLog = $this->logThuongDonHang->findKiemTraDonHangDaThuong($hoaDonBanHang->id);

                    $so_tien_mua = $hoaDonBanHang->so_tien_mua;


                    if (empty($kiemTraThuongLog)) {
                        // Cộng hoa hồng cho cộng tác viên mức 1
                        $congTacVien = $this->congTacVien->findByEmail($hoaDonBanHang->email_cong_tac_vien);
                        $tienNguoiDung = null;
                        $caiDat = $this->caiDat->getConfig();

                        if (!empty($congTacVien)) {
                            $tienNguoiDung  = $this->tienNguoiDung->findByEmail($congTacVien->email);
                            if (!empty($khachHangMua) && !empty($tienNguoiDung)) {
                                // Nếu là CTV COD thì không thuởng mức 1 và chuyển tiền về đúng số tiền của nó
                                $so_tien_duoc_thuong = $hoaDonBanHang->so_tien_mua * $caiDat->phan_tram_thuong_doanh_thu_cap_1 / 100;
                                if ($hoaDonBanHang->loai_thanh_toan == 'CTV COD') {
                                    $so_tien_mua = $hoaDonBanHang->so_tien_mua * 100 / 85; //tính lại số tiền chưa chiết khấu
                                    $so_tien_duoc_thuong = 0;
                                }
                                $logThuongDonHang = $this->logThuongDonHang->create([
                                    'id_nguoi_duoc_thuong'   => $congTacVien->id,
                                    'ten_nguoi_duoc_thuong'  => $congTacVien->email,
                                    'id_don_hang'            => $hoaDonBanHang->id,
                                    'so_tien_mua_don_hang'   => $so_tien_mua,
                                    'phan_tram_duoc_thuong'  => $caiDat->phan_tram_thuong_doanh_thu_cap_1 / 100,
                                    'ten_khach_hang_mua'     => $khachHangMua->ho_ten,
                                    'sdt_khach_hang_mua'     => $khachHangMua->sdt,
                                    'email_khach_hang_mua'   => $khachHangMua->email,
                                    'so_tien_duoc_thuong'    => $so_tien_duoc_thuong,
                                    'hash'                   => $hoaDonBanHang->hash,
                                    'cap_thuong'             => LogThuongDonHang::CAP_THUONG[1],
                                ]);

                                // Thực hiện việc thưởng tiền
                                if (!empty($tienNguoiDung)) {
                                    $tienNguoiDung->thuong_hoa_hong_muc_1   = $tienNguoiDung->thuong_hoa_hong_muc_1 + $logThuongDonHang->so_tien_duoc_thuong;
                                    $tienNguoiDung->tong_tien_vnd           = $tienNguoiDung->tong_tien_vnd + $logThuongDonHang->so_tien_duoc_thuong;
                                    $tienNguoiDung->save();

                                    // quoclong_gui_email_3
                                    $ho_ten = $congTacVien->ho_va_ten;
                                    SendMail::send($congTacVien->email, 'Thông báo thưởng tiền', view('email.thong_bao_khi_duoc_thuong_tien_vao_tai_khoan_ctv', compact('ho_ten'))->render());
                                }
                            }
                        }

                        // Thực hiện việc thưởng tiền cũ (Move logic vào trong if)
                        // Cộng hoa hồng cho cộng tác viên mức 2
                        if (!empty($congTacVien)) {
                            $emailCap2 = $congTacVien->email_gioi_thieu;
                            $congTacVienCap2 =  $this->congTacVien->findByEmail($emailCap2);
                            $tienNguoiDung  = $this->tienNguoiDung->findByEmail($emailCap2);
                            if ($hoaDonBanHang->loai_thanh_toan == 'CTV COD') {
                                $so_tien_mua = $hoaDonBanHang->so_tien_mua * 100 / 85; //tính lại số tiền chưa chiết khấu
                            }
                            if (!empty($congTacVienCap2) && !empty($tienNguoiDung) && !empty($khachHangMua)) {
                                $logThuongDonHangCap2 = $this->logThuongDonHang->create([
                                    'id_nguoi_duoc_thuong'   => $congTacVienCap2->id,
                                    'ten_nguoi_duoc_thuong'  => $congTacVienCap2->email,
                                    'id_don_hang'            => $hoaDonBanHang->id,
                                    'so_tien_mua_don_hang'   => $so_tien_mua,
                                    'phan_tram_duoc_thuong'  => $caiDat->phan_tram_thuong_doanh_thu_cap_2 / 100,
                                    'ten_khach_hang_mua'     => $khachHangMua->ho_ten,
                                    'sdt_khach_hang_mua'     => $khachHangMua->sdt,
                                    'email_khach_hang_mua'   => $khachHangMua->email,
                                    'so_tien_duoc_thuong'    => $so_tien_mua * $caiDat->phan_tram_thuong_doanh_thu_cap_2 / 100,
                                    'hash'                   => $hoaDonBanHang->hash,
                                    'cap_thuong'             => LogThuongDonHang::CAP_THUONG[2],
                                ]);

                                // Thực hiện việc thưởng tiền
                                $tienNguoiDung->thuong_hoa_hong_muc_2   = $tienNguoiDung->thuong_hoa_hong_muc_2 + $logThuongDonHangCap2->so_tien_duoc_thuong;
                                $tienNguoiDung->tong_tien_vnd           = $tienNguoiDung->tong_tien_vnd + $logThuongDonHangCap2->so_tien_duoc_thuong;
                                $tienNguoiDung->save();

                                // quoclong_gui_email_3
                                $ho_ten = $congTacVienCap2->ho_va_ten;
                                SendMail::send($congTacVienCap2->email, 'Thông báo thưởng tiền', view('email.thong_bao_khi_duoc_thuong_tien_vao_tai_khoan_ctv', compact('ho_ten'))->render());
                            }
                        }
                    }

                    DB::commit();

                    return return_message('toastr', 'success', 'Đã thực hiện xong!.');
                } elseif ($data['phuong_thuc_van_chuyen'] == '3') {
                    return return_message('toastr', 'error', 'Chức năng này sẽ cập nhật trong 3 ngày nữa, xin cảm ơn!.');

                    if ($hoaDonBanHang->trang_thai != HoaDonBanHang::TRANG_THAI['DA_THANH_TOAN']) {
                        $hoaDonBanHang->trang_thai     = HoaDonBanHang::TRANG_THAI['ADMIN_HUY_DON_HANG'];
                        $hoaDonBanHang->email_cap_nhat = $user->email;
                        $hoaDonBanHang->ghi_chu        = $data['ly_do'];
                        $hoaDonBanHang->save();

                        DB::commit();

                        return return_message('toastr', 'success', 'Thực hiện huỷ đơn hàng thành công');
                    } else {
                        return return_message('toastr', 'error', 'Đơn hàng này đã thanh toán, không thể huỷ');
                    }
                }
                return return_message('toastr', 'error', 'Không làm');
            }
        } catch (Exception $ex) {
            \Log::error($ex->getMessage());

            DB::rollback();
        }
    }

    public function getChiTiet(Request $request, $id)
    {
        $chiTietHoaDonBanSanPham = $this->chiTietHoaDonBanSanPham->getByIdHoaDonBanHangWithSanPham($id);

        return view('admin.hoa_don_ban_hang.partials.modals.chi_tiet', compact('chiTietHoaDonBanSanPham'));
    }

    public function inHoaDonBanHang(Request $request, $hash)
    {
        $pdf = \App::make('dompdf.wrapper');

        \PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

        $info = [
            'hoa_don_ban_hang' => $this->hoaDonBanHang->findByHashWithKhachHang($hash),
            'chi_tiet_hoa_don' => $this->chiTietHoaDonBanSanPham->getChiTietHoaDonWithKhachHang($hash)
        ];

        $pdf->loadHTML(view('phieu_nhap_xuat.phieu_xuat', compact('info'))->render())->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
