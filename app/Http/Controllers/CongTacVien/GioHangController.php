<?php

namespace App\Http\Controllers\CongTacVien;

use DB;
use Auth;
use Uuid;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Jobs\SendMail;
use App\Entities\HoaDonBanHang;
use App\Entities\LogThuongDonHang;
use App\Repositories\Contracts\GioHangRepository;
use App\Repositories\Contracts\SanPhamRepository;
use App\Repositories\Contracts\CongTacVienRepository;
use App\Repositories\Contracts\Admin\CaiDatRepository;
use App\Repositories\Contracts\TienNguoiDungRepository;
use App\Repositories\Contracts\HoaDonBanHangRepository;
use App\Repositories\Contracts\LogThuongDonHangRepository;
use App\Repositories\Contracts\ChiTietHoaDonBanSanPhamRepository;

class GioHangController extends Controller
{
    protected $caiDat;
    protected $gioHang;
    protected $sanPham;
    protected $congTacVien;
    protected $tienNguoiDung;
    protected $hoaDonBanHang;
    protected $logThuongDonHang;
    protected $chiTietHoaDonBanSanPham;

    public function __construct(
        CaiDatRepository $caiDat,
        GioHangRepository $gioHang,
        SanPhamRepository $sanPham,
        CongTacVienRepository $congTacVien,
        TienNguoiDungRepository $tienNguoiDung,
        HoaDonBanHangRepository $hoaDonBanHang,
        LogThuongDonHangRepository $logThuongDonHang,
        ChiTietHoaDonBanSanPhamRepository $chiTietHoaDonBanSanPham
    ) {
        $this->caiDat                   = $caiDat;
        $this->gioHang                  = $gioHang;
        $this->sanPham                  = $sanPham;
        $this->congTacVien              = $congTacVien;
        $this->tienNguoiDung            = $tienNguoiDung;
        $this->hoaDonBanHang            = $hoaDonBanHang;
        $this->logThuongDonHang         = $logThuongDonHang;
        $this->chiTietHoaDonBanSanPham  = $chiTietHoaDonBanSanPham;
    }

    public function index(Request $request)
    {
        return view('cong_tac_vien.gio_hang.index');
    }

    public function list(Request $request)
    {
        $user = Auth::guard('cong_tac_vien')->user();

        $soLuong    = 0;
        $sanPham    = [];
        $sanPhamTam = [];
        $sanPhamKey = [];
        $gioHang    = $this->gioHang->findByEmail($user->email);
        $caiDat     = $this->caiDat->getConfig();
        $phiShipCodTheoMilk = 0;
        $phiShipCod = $caiDat->phi_ship_cod;
        if (!empty($gioHang) && $gioHang->gio_hang_noi_dung !== '') {
            // Chuyển thành Array
            $sanPhamTam = json_decode($gioHang->gio_hang_noi_dung);

            // Chuyển thành array mới với key là san_pham_id
            foreach ($sanPhamTam as $item) {
                $sanPhamKey[$item->san_pham_id] = [
                    'san_pham_so_luong' => $item->san_pham_so_luong,
                ];
            }

            $check  = true;
            // Where với những $ids vừa lấy đc
            $sanPham = $this->sanPham->getByIdsWithChuyenMucWithCaiDatNgonNgu(array_keys($sanPhamKey));
            foreach ($sanPham as $item) {
                $item->san_pham_so_luong = $sanPhamKey[$item->san_pham_id]['san_pham_so_luong'];
                if ($check) {
                    $phiShipCodTheoMilk = $caiDat->phi_ship_cod / $item->ti_gia_milk;
                    //$check = false;
                }
            }

            // Lấy sản phẩm key
            $soLuong = count($sanPhamKey);
        }

        $caiDat         = $this->caiDat->getConfig();
        $tienNguoiDung  = $this->tienNguoiDung->findByEmail($user->email);

        return view('cong_tac_vien.gio_hang.partials.page_gio_hang', compact('sanPham', 'soLuong', 'tienNguoiDung', 'caiDat', 'phiShipCodTheoMilk', 'phiShipCod', 'user'));
    }

    public function update(Request $request)
    {
        // Validate here
        $data = $request->all();

        // Process
        $user    = Auth::guard('cong_tac_vien')->user();
        $gioHang = $this->gioHang->findByEmail($user->email);
        $gioHang->gio_hang_noi_dung = json_encode($data);
        $gioHang->save();
    }

    public function thanhToan(Request $request)
    {
        DB::beginTransaction();

        try {
            // Validate here
            $data   = $request->all();
            $caiDat = $this->caiDat->getConfig();
            $user   = Auth::guard('cong_tac_vien')->user();

            // Tính tổng tiền
            $tongTien = 0;
            $tongMilk = 0;
            $danhSachSanPham = '';
            $chiTietSanPhamArray = [];

            // Kiểm tra số luợng sản phẩm trong kho có đủ không
            $check = true;
            $phi_ship_cod_theo_milk = 0;
            foreach ($data['san_pham'] as $item) {
                $sanPham        = $this->sanPham->findByIdWithCaiDatNgonNgu($item['id']);
                $don_gia        = $sanPham->san_pham_gia_ban_thuc_te;
                $so_luong       = $item['so_luong'];
                $so_luong       = $item['so_luong'];
                $don_gia        = $don_gia * (1 - $caiDat->phan_tram_thuong_doanh_thu_cap_1 / 100);
                $don_gia_milk   = $don_gia / $sanPham->ti_gia_milk;
                $tong           = $so_luong * $don_gia;
                $tongTien       += $tong;
                $tongMilk       += $don_gia_milk * $so_luong;
                if ($check) {
                    $phi_ship_cod_theo_milk = $caiDat->phi_ship_cod / $sanPham->ti_gia_milk;
                    $tongMilk = $tongMilk + $phi_ship_cod_theo_milk;
                    $tongTien = $tongTien + $caiDat->phi_ship_cod;
                    $check = false;
                }

                // Tìm số luợng sản phẩm còn trong kho
                $sanPhamTrongKho = $this->sanPham->findbyId($item['id']);

                if ($sanPhamTrongKho->san_pham_so_luong < $so_luong) {
                    $danhSachSanPham .= $sanPhamTrongKho->san_pham_ten . ', trong kho chỉ còn ' . $sanPhamTrongKho->san_pham_so_luong . ' sản phẩm. ';
                } else {
                    $chiTietSanPhamArray[$item['id']] = [
                        'id_san_pham'     => $item['id'],
                        'so_luong'        => $so_luong,
                        'don_gia'         => $don_gia,
                        'tong_tien_vnd'   => $tong,
                        'tong_tien_milk'  => $so_luong * $don_gia_milk,
                        'loai_thanh_toan' => 'CTV VND',
                    ];
                }
            }

            $tienNguoiDung = $this->tienNguoiDung->findByEmail($user->email);

            // Log thưởng đơn hàng người dùng cấp 2
            $userNguoiDuocThuong  = $this->congTacVien->findByEmailXacThuc($user->email_gioi_thieu);
            $tongTienKhongChietKhau = round(($tongTien - $caiDat->phi_ship_cod) / (1 - $caiDat->phan_tram_thuong_doanh_thu_cap_1 / 100), 0);

            // Nếu như có sản phẩm mà hết hàng thì thông báo.
            if (!empty($danhSachSanPham)) {
                return return_message('toastr', 'error', 'Sản phẩm không thể bán vì không đủ số lượng: ' . substr($danhSachSanPham, 0, strlen($danhSachSanPham) - 2));
            }
            // Nếu như tất cả sản phẩm đều dã có thể bán đưọc, thì chuyể qua buớc thanh toán
            if ($data['phuong_thuc_thanh_toan'] == 'VND') {
                if ($tienNguoiDung->tong_tien_vnd < $tongTien) {
                    return return_message('toastr', 'error', 'Bạn không đủ tiền VND thanh toán');
                } else {
                    // Thêm vào hoá đơn bán hàng
                    $hoaDonBanHang = $this->hoaDonBanHang->create([
                        'loai_thanh_toan'       => 'CTV VND',
                        'email_cong_tac_vien'   => $user->email,
                        'email_khach_hang_mua'  => $user->email,
                        'so_tien_mua'           => $tongTien - $caiDat->phi_ship_cod,
                        'hash'                  => Uuid::generate(4)->string,
                        'trang_thai'            => HoaDonBanHang::TRANG_THAI['DA_THANH_TOAN'],
                        'dia_chi_nhan_hang'     => $data['dia_chi_giao_hang'],
                        'fee_ship'              => $caiDat->phi_ship_cod,
                        'sdt_khach_hang_mua'    => $user->so_dien_thoai,
                    ]);

                    // Thêm vào chi tiết bán hàng
                    foreach ($data['san_pham'] as $item) {
                        $temp = $this->chiTietHoaDonBanSanPham->create(array_merge($chiTietSanPhamArray[$item['id']], [
                            'id_hoa_don_ban_hang' => $hoaDonBanHang->id
                        ]));
                    }

                    // Xoá giỏ hàng (tạm)
                    $gioHang = $this->gioHang->findByEmail($user->email);
                    $gioHang->gio_hang_noi_dung = '';
                    $gioHang->save();

                    // Trừ tiền bảng tien_nguoi_dung
                    $tienNguoiDung  = $this->tienNguoiDung->findByEmail($user->email);
                    $tienNguoiDung->tong_tien_vnd -= $tongTien;
                    $tienNguoiDung->save();

                    if (!empty($userNguoiDuocThuong)) {
                        $logThuongDonHang = $this->logThuongDonHang->create([
                            'id_nguoi_duoc_thuong'  => $userNguoiDuocThuong->id,
                            'ten_nguoi_duoc_thuong' => $userNguoiDuocThuong->email,
                            'id_don_hang'           => $hoaDonBanHang->id,
                            'so_tien_mua_don_hang'  => $tongTienKhongChietKhau,
                            'phan_tram_duoc_thuong' => $caiDat->phan_tram_thuong_doanh_thu_cap_2 / 100,
                            'ten_khach_hang_mua'    => $user->ho_va_ten,
                            'sdt_khach_hang_mua'    => $user->so_dien_thoai,
                            'email_khach_hang_mua'  => $user->email,
                            'so_tien_duoc_thuong'   => $tongTienKhongChietKhau * $caiDat->phan_tram_thuong_doanh_thu_cap_2 / 100,
                            'hash'                  => $hoaDonBanHang->hash,
                            'cap_thuong'            => LogThuongDonHang::CAP_THUONG[2],
                        ]);

                        // Thực hiện việc thưởng tiền
                        $tienNguoiDung  = $this->tienNguoiDung->findByEmail($userNguoiDuocThuong->email);
                        $tienNguoiDung->thuong_hoa_hong_muc_2 = $tienNguoiDung->thuong_hoa_hong_muc_2 + $logThuongDonHang->so_tien_duoc_thuong;
                        $tienNguoiDung->tong_tien_vnd         = $tienNguoiDung->tong_tien_vnd + $logThuongDonHang->so_tien_duoc_thuong;
                        $tienNguoiDung->save();

                        // quoclong_gui_email_3
                        $ho_ten = $userNguoiDuocThuong->ho_va_ten;
                        SendMail::send($userNguoiDuocThuong->email, 'Thông báo thưởng tiền', view('email.thong_bao_khi_duoc_thuong_tien_vao_tai_khoan_ctv', compact('ho_ten'))->render());
                    }

                    // Log thưởng cho người dùng cấp 1
                    // Tuy nhiên ko đc thưởng vì đã chiết khấu
                    $logThuongDonHang = $this->logThuongDonHang->create([
                        'id_nguoi_duoc_thuong'  => $user->id,
                        'ten_nguoi_duoc_thuong' => $user->email,
                        'id_don_hang'           => $hoaDonBanHang->id,
                        'so_tien_mua_don_hang'  => $tongTienKhongChietKhau,
                        'phan_tram_duoc_thuong' => $caiDat->phan_tram_thuong_doanh_thu_cap_1 / 100,
                        'ten_khach_hang_mua'    => $user->ho_va_ten,
                        'sdt_khach_hang_mua'    => $user->so_dien_thoai,
                        'email_khach_hang_mua'  => $user->email,
                        'so_tien_duoc_thuong'   => 0,
                        'hash'                  => $hoaDonBanHang->hash,
                        'cap_thuong'            => LogThuongDonHang::CAP_THUONG[1],
                    ]);
                }
            } elseif ($data['phuong_thuc_thanh_toan'] == 'MILK') { // Phưong thức thanh toán milk
                if ($tienNguoiDung->the_milk < $tongMilk) {
                    return return_message('toastr', 'error', 'Bạn không đủ MILK thanh toán');
                } else {
                    // Thêm vào hoá đơn bán hàng
                    $hoaDonBanHang = $this->hoaDonBanHang->create([
                        'loai_thanh_toan'      => 'CTV MILK',
                        'email_cong_tac_vien'  => $user->email,
                        'email_khach_hang_mua' => $user->email,
                        'so_tien_mua'          => $tongTien - $caiDat->phi_ship_cod,
                        'so_milk_mua'          => $tongMilk - $phi_ship_cod_theo_milk,
                        'hash'                 => Uuid::generate(4)->string,
                        'trang_thai'           => HoaDonBanHang::TRANG_THAI['DA_THANH_TOAN'],
                        'dia_chi_nhan_hang'    => $data['dia_chi_giao_hang'],
                        'fee_ship'             => $caiDat->phi_ship_cod,
                        'sdt_khach_hang_mua'   => $user->so_dien_thoai,
                    ]);

                    // Thêm vào chi tiết bán hàng
                    foreach ($data['san_pham'] as $item) {
                        $temp = $this->chiTietHoaDonBanSanPham->create(array_merge($chiTietSanPhamArray[$item['id']], [
                            'id_hoa_don_ban_hang' => $hoaDonBanHang->id
                        ]));
                    }

                    // Xoá giỏ hàng (tạm)
                    $gioHang = $this->gioHang->findByEmail($user->email);
                    $gioHang->gio_hang_noi_dung = '';
                    $gioHang->save();

                    // Trừ tiền bảng tien_nguoi_dung
                    $tienNguoiDung  = $this->tienNguoiDung->findByEmail($user->email);
                    $tienNguoiDung->the_milk -= $tongMilk;
                    $tienNguoiDung->save();

                    // Log thưởng đơn hàng người dùng cấp 2
                    $userNguoiDuocThuong  = $this->congTacVien->findByEmailXacThuc($user->email_gioi_thieu);
                    $tongTienMilkChietKhau = round(($tongTien - $caiDat->phi_ship_cod) / (1 - $caiDat->phan_tram_thuong_doanh_thu_cap_1 / 100), 0);
                    if (!empty($userNguoiDuocThuong)) {
                        $logThuongDonHang = $this->logThuongDonHang->create([
                            'id_nguoi_duoc_thuong'   => $userNguoiDuocThuong->id,
                            'ten_nguoi_duoc_thuong'  => $userNguoiDuocThuong->email,
                            'id_don_hang'            => $hoaDonBanHang->id,
                            'so_tien_mua_don_hang'   => $tongTienMilkChietKhau,
                            'phan_tram_duoc_thuong'  => $caiDat->phan_tram_thuong_doanh_thu_cap_2 / 100,
                            'ten_khach_hang_mua'     => $user->ho_va_ten,
                            'sdt_khach_hang_mua'     => $user->so_dien_thoai,
                            'email_khach_hang_mua'   => $user->email,
                            'so_tien_duoc_thuong'    => $tongTienMilkChietKhau * $caiDat->phan_tram_thuong_doanh_thu_cap_2 / 100,
                            'hash'                   => $hoaDonBanHang->hash,
                            'cap_thuong'             => LogThuongDonHang::CAP_THUONG[2],
                        ]);

                        // Thực hiện việc thưởng tiền
                        $tienNguoiDung  = $this->tienNguoiDung->findByEmail($userNguoiDuocThuong->email);
                        $tienNguoiDung->thuong_hoa_hong_muc_2   = $tienNguoiDung->thuong_hoa_hong_muc_2 + $logThuongDonHang->so_tien_duoc_thuong;
                        $tienNguoiDung->tong_tien_vnd           = $tienNguoiDung->tong_tien_vnd + $logThuongDonHang->so_tien_duoc_thuong;
                        $tienNguoiDung->save();

                        // quoclong_gui_email_3
                        $ho_ten = $userNguoiDuocThuong->ho_va_ten;
                        SendMail::send($userNguoiDuocThuong->email, 'Thông báo thưởng tiền', view('email.thong_bao_khi_duoc_thuong_tien_vao_tai_khoan_ctv', compact('ho_ten'))->render());
                    }

                    // Log thưởng cho người dùng cấp 1
                    // Tuy nhiên ko đc thưởng vì đã chiết khấu
                    $logThuongDonHang = $this->logThuongDonHang->create([
                        'id_nguoi_duoc_thuong'   => $user->id,
                        'ten_nguoi_duoc_thuong'  => $user->email,
                        'id_don_hang'            => $hoaDonBanHang->id,
                        'so_tien_mua_don_hang'   => $tongTienKhongChietKhau,
                        'phan_tram_duoc_thuong'  => $caiDat->phan_tram_thuong_doanh_thu_cap_1 / 100,
                        'ten_khach_hang_mua'     => $user->ho_va_ten,
                        'sdt_khach_hang_mua'     => $user->so_dien_thoai,
                        'email_khach_hang_mua'   => $user->email,
                        'so_tien_duoc_thuong'    => 0,
                        'hash'                   => $hoaDonBanHang->hash,
                        'cap_thuong'             => LogThuongDonHang::CAP_THUONG[1],
                    ]);
                }
            } else {
                    // Phuơng thức thanh toán COD cộng tác viên
                    // Thêm vào hoá đơn bán hàng
                    $tongTien = $tongTien - $caiDat->phi_ship_cod ;
                    $hoaDonBanHang = $this->hoaDonBanHang->create([
                        'loai_thanh_toan'       => 'CTV COD',
                        'email_cong_tac_vien'   => $user->email,
                        'email_khach_hang_mua'  => $user->email,
                        'so_tien_mua'           => $tongTien,
                        'hash'                  => Uuid::generate(4)->string,
                        'trang_thai'            => HoaDonBanHang::TRANG_THAI['CHUA_THANH_TOAN'],
                        'dia_chi_nhan_hang'     => $data['dia_chi_giao_hang'],
                        'fee_ship'              => $caiDat->phi_ship_cod,
                        'sdt_khach_hang_mua'    => $user->so_dien_thoai,
                    ]);

                    // Thêm vào chi tiết bán hàng
                foreach ($data['san_pham'] as $item) {
                    $temp = $this->chiTietHoaDonBanSanPham->create(array_merge($chiTietSanPhamArray[$item['id']], [
                        'id_hoa_don_ban_hang' => $hoaDonBanHang->id
                    ]));
                }

                    // Xoá giỏ hàng (tạm)
                    $gioHang = $this->gioHang->findByEmail($user->email);
                    $gioHang->gio_hang_noi_dung = '';
                    $gioHang->save();

                     // Gửi mail thông báo đơn hàng của họ
                    app(\App\Http\Controllers\GioHangController::class)->guiMailThongBao($hoaDonBanHang->id);
            }

            DB::commit();

            return return_message('toastr', 'success', 'Đã thực hiện thanh toán thành công');
        } catch (Exception $ex) {
            \Log::error($ex->getMessage());

            DB::rollBack();
        }
    }

    public function destroy(Request $request, $id)
    {
        // Process
        $user       = Auth::guard('cong_tac_vien')->user();
        $gioHang    = $this->gioHang->findByEmail($user->email);
        if (!empty($gioHang) && $gioHang->gio_hang_noi_dung !== '') {
            // Chuyển thành Array
            $sanPhamTam = json_decode($gioHang->gio_hang_noi_dung);

            $sanPham = [];
            // Tìm item cần xoá và bỏ qua chúng khi tạo mảng mới
            foreach ($sanPhamTam as $item) {
                if ($item->san_pham_id !== $id) {
                    $sanPham[] = $item;
                }
            }

            $gioHang->gio_hang_noi_dung = json_encode($sanPham);
            $gioHang->save();

            return return_message('toastr', 'success', 'Xoá sản phẩm thành công');
        }
    }
}
