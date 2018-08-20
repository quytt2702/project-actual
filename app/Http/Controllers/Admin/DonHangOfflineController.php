<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Uuid;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entities\HoaDonBanHang;
use App\Repositories\Contracts\WardRepository;
use App\Repositories\Contracts\DistrictRepository;
use App\Repositories\Contracts\ProvinceRepository;
use App\Repositories\Contracts\KhachHangRepository;
use App\Repositories\Contracts\SanPhamRepository;
use App\Repositories\Contracts\HoaDonBanHangRepository;
use App\Repositories\Contracts\ChiTietHoaDonBanSanPhamRepository;

class DonHangOfflineController extends Controller
{
    protected $quan;
    protected $phuong;
    protected $sanPham;
    protected $khachHang;
    protected $tinhThanh;
    protected $hoaDonBanHang;

    public function __construct(
        WardRepository $phuong,
        DistrictRepository $quan,
        SanPhamRepository $sanPham,
        ProvinceRepository $tinhThanh,
        KhachHangRepository $khachHang,
        HoaDonBanHangRepository $hoaDonBanHang,
        ChiTietHoaDonBanSanPhamRepository $chiTietHoaDonBanSanPham
    ) {
        $this->quan                     = $quan;
        $this->phuong                   = $phuong;
        $this->sanPham                  = $sanPham;
        $this->tinhThanh                = $tinhThanh;
        $this->khachHang                = $khachHang;
        $this->hoaDonBanHang            = $hoaDonBanHang;
        $this->chiTietHoaDonBanSanPham  = $chiTietHoaDonBanSanPham;
    }

    public function index(Request $request)
    {
        return view('admin.don_hang_offline.index');
    }

    public function table(Request $request)
    {
        $hoaDonBanHang = $this->hoaDonBanHang->getHoaDonBanHangOfflineWithKhachHang();

        return view('admin.don_hang_offline.partials.body-table', compact('hoaDonBanHang'));
    }

    public function add(Request $request)
    {
        $sanPham   = $this->sanPham->all();
        $tinhThanh = $this->tinhThanh->getTinhThanh();

        return view('admin.don_hang_offline.add', compact('sanPham', 'tinhThanh'));
    }

    public function store(Request $request)
    {
        // Validate here
        $user = Auth::guard('admin')->user();
        $data = $request->all();

        DB::beginTransaction();
        try {
            // Tìm khách hàng đã có trong DB chưa
            $khachHang = $this->khachHang->findByEmailVaSdtWithOffline($data['email'], $data['sdt']);
            if (empty($khachHang)) {
                $khachHang = $this->khachHang->create([
                    'ho_ten'    => $data['ho_ten'],
                    'email'     => $data['email'],
                    'sdt'       => $data['sdt'],
                    'duong'     => $data['duong'],
                    'phuong'    => $data['phuong'],
                    'quan'      => $data['quan'],
                    'thanh_pho' => $data['thanh_pho'],
                    'email_ctv' => 'Offline',
                ]);
            }

            // Tạo đơn hàng, để lấy đuợc id hoá đơn bán hàng
            $hoaDonBanHang = $this->hoaDonBanHang->create([
            ]);
            $tongTien = 0;
            $tongChietKhau = 0;
            $danhSachSanPhamThieu = '';

            foreach ($data['noi_dung_san_pham'] as $item) {
                $sanPham = $this->sanPham->findById($item['id_san_pham']);
                if ($sanPham->san_pham_so_luong < $item['so_luong']) {
                    $danhSachSanPhamThieu .= $sanPham->san_pham_ten . ', trong kho chỉ còn ' . $sanPham->san_pham_so_luong . ' sản phẩm. ';
                } else {
                    $chiTietHoaDonBanSanPham = $this->chiTietHoaDonBanSanPham->create([
                        'id_hoa_don_ban_hang'   => $hoaDonBanHang->id,
                        'id_san_pham'           => $item['id_san_pham'],
                        'so_luong'              => $item['so_luong'],
                        'don_gia'               => $sanPham->san_pham_gia_ban_thuc_te,
                        'phan_tram_chiet_khau'  => $item['chiet_khau'],
                        'tong_tien_vnd'         => $item['so_luong'] * $sanPham->san_pham_gia_ban_thuc_te,
                        'loai_thanh_toan'       => 'Offline',
                    ]);
                    $sanPham->san_pham_so_luong  = $sanPham->san_pham_so_luong - $item['so_luong'];
                    $sanPham->save();
                    $tongTien       = $tongTien + $item['so_luong'] * $sanPham->san_pham_gia_ban_thuc_te;
                    $tongChietKhau  = $tongChietKhau + $item['so_luong'] * $item['chiet_khau'] * $sanPham->san_pham_gia_ban_thuc_te;
                }
            }

            // Nếu như có sản phẩm mà hết hàng thì thông báo.
            if (!empty($danhSachSanPhamThieu)) {
                return return_message('toastr', 'error', 'Sản phẩm không thể bán vì không đủ số lượng: ' . substr($danhSachSanPhamThieu, 0, strlen($danhSachSanPhamThieu) - 2));
            }

            $diaChiGiaoHang =  $data['duong'] . ', ' . $data['phuong'] . ', ' . $data['quan'] . ', ' . $data['thanh_pho'];

            // Update hoá đơn bán hàng
            $hoaDonBanHang->loai_thanh_toan      = 'Offline';
            $hoaDonBanHang->email_cong_tac_vien  = $user->email;
            $hoaDonBanHang->sdt_khach_hang_mua   = $data['sdt'];
            $hoaDonBanHang->email_khach_hang_mua = $data['email'];
            $hoaDonBanHang->dia_chi_nhan_hang    = $diaChiGiaoHang;
            $hoaDonBanHang->so_tien_mua          = $tongTien;
            $hoaDonBanHang->trang_thai           = HoaDonBanHang::TRANG_THAI['THUC_HIEN_THANH_CONG'];
            $hoaDonBanHang->hash                 = Uuid::generate(4)->string;
            $hoaDonBanHang->chiet_khau           = $tongChietKhau;
            $hoaDonBanHang->ghi_chu              = $data['ghi_chu'];
            $hoaDonBanHang->save();

            DB::commit();

            return return_message('toastr', 'success', trans('notification.add.success'), true, route('admin.don_hang_offline.index'));
        } catch (Exception $ex) {
            \Log::info($ex->getMessage());

            DB::rollback();

            return return_message('toastr', 'error', 'Có lỗi xảy ra');
        }
    }

    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $chiTietHoaDonBanSanPham = $this->chiTietHoaDonBanSanPham->getByIdHoaDonBanHang($id);
            foreach ($chiTietHoaDonBanSanPham as $item) {
                $sanPham = $this->sanPham->findById($item->id_san_pham);
                if (!empty($sanPham)) {
                    $sanPham->san_pham_so_luong = $sanPham->san_pham_so_luong + $item->so_luong;
                    $sanPham->save();
                }
                $item->delete();
            }
            $hoaDonBanHang = $this->hoaDonBanHang->findById($id);
            $hoaDonBanHang->delete();

            DB::commit();

            return return_message('toastr', 'success', 'Đã xoá đơn hàng thành công!.');
        } catch (Exception $ex) {
            \Log::info($ex->getMessage());
            DB::rollback();
            return return_message('toastr', 'error', 'Có lỗi xảy ra');
        }
    }
}
