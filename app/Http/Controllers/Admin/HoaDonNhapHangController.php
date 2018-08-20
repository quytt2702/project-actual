<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\SanPhamRepository;
use App\Repositories\Contracts\NhaCungCapRepository;
use App\Repositories\Contracts\HoaDonNhapHangRepository;
use App\Repositories\Contracts\LogHoaDonNhapHangRepository;
use App\Repositories\Contracts\ChiTietHoaDonNhapSanPhamRepository;
use App\Validators\Admin\HoaDonNhapHang\StoreHoaDonNhapHangValidator;

class HoaDonNhapHangController extends Controller
{
    protected $sanPham;
    protected $nhaCungCap;
    protected $hoaDonNhapHang;
    protected $logHoaDonNhapHang;
    protected $chiTietHoaDonNhapSanPham;

    public function __construct(
        SanPhamRepository $sanPham,
        NhaCungCapRepository $nhaCungCap,
        HoaDonNhapHangRepository $hoaDonNhapHang,
        LogHoaDonNhapHangRepository $logHoaDonNhapHang,
        ChiTietHoaDonNhapSanPhamRepository $chiTietHoaDonNhapSanPham
    ) {
        $this->sanPham                  = $sanPham;
        $this->nhaCungCap               = $nhaCungCap;
        $this->hoaDonNhapHang           = $hoaDonNhapHang;
        $this->logHoaDonNhapHang        = $logHoaDonNhapHang;
        $this->chiTietHoaDonNhapSanPham = $chiTietHoaDonNhapSanPham;
    }

    public function index(Request $request)
    {
        return view('admin.hoa_don_nhap_hang.index');
    }

    public function list(Request $request)
    {
        $hoaDonNhapHang = $this->hoaDonNhapHang->all();

        return view('admin.hoa_don_nhap_hang.partials.danh_sach_don_hang_table', compact('hoaDonNhapHang'));
    }

    public function add(Request $request)
    {
        $sanPham    = $this->sanPham->all();
        $nhaCungCap = $this->nhaCungCap->all();

        return view('admin.hoa_don_nhap_hang.partials.modals.tao', compact('nhaCungCap', 'sanPham'));
    }

    public function store(Request $request, StoreHoaDonNhapHangValidator $validator)
    {
        // Validate
        $user = Auth::guard('admin')->user();
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        DB::beginTransaction();
        try {
            $hoaDonNhapHang = $this->hoaDonNhapHang->create([
                'hoa_don_nhap_hang_email_nguoi_tao' => $user->email
            ]);

            foreach ($data as $item) {
                // Thêm vào bảng chi tiết hoá đơn nhập sản phẩm
                $this->chiTietHoaDonNhapSanPham->create([
                    'id_san_pham'               => $item['id_san_pham'],
                    'so_luong_san_pham_nhap'    => $item['so_luong'],
                    'don_gia_nhap_san_pham'     => $item['don_gia'],
                    'id_nha_cung_cap'           => $item['id_nha_cung_cap'],
                    'id_hoa_don_nhap_san_pham'  => $hoaDonNhapHang->id,
                ]);

                // Cập nhật lại số lượng sản phẩm đó
                $sanPham = $this->sanPham->findById($item['id_san_pham']);
                $sanPham->san_pham_so_luong += $item['so_luong'];
                $sanPham->save();
            }

            DB::commit();

            return return_message('toastr', 'success', trans('notification.add.success'));
        } catch (Exception $ex) {
            \Log::info($ex->getMessage());

            DB::rollback();
        }
    }

    public function chiTiet(Request $request, $id_don_hang)
    {
        // Validate here
        $chiTietHoaDonNhapSanPham = $this->chiTietHoaDonNhapSanPham->findByIdDonHangWithNhaCungCapVaSanPham($id_don_hang);
        $logHoaDonNhapHang = $this->logHoaDonNhapHang->getByIdHoaDonNhapHang($id_don_hang);

        return view('admin.hoa_don_nhap_hang.partials.chi_tiet_don_hang_table', compact('chiTietHoaDonNhapSanPham', 'logHoaDonNhapHang', 'id_don_hang'));
    }

    public function destroy(Request $request, $id_don_hang)
    {
        // Validate here
        $hoaDonNhapHang = $this->hoaDonNhapHang->findById($id_don_hang);

        DB::beginTransaction();
        try {
            $hoaDonNhapHang->delete();
            $chiTietHoaDonNhapSanPham = $this->chiTietHoaDonNhapSanPham->findByIdDonHangWithNhaCungCapVaSanPham($id_don_hang);

            // Trừ số lượng mỗi sản phẩm
            foreach ($chiTietHoaDonNhapSanPham as $item) {
                $sanPham = $this->sanPham->findById($item->id_san_pham);
                // ddd($sanPham);
                if (!empty($sanPham)) {
                    $sanPham->san_pham_so_luong -= $item->so_luong_san_pham_nhap;
                    $sanPham->save();
                }
            }

            DB::commit();

            // Lưu lại log (Chưa làm)
        } catch (Exception $ex) {
            \Log::info($ex->getMessage());

            DB::rollback();
        }
    }

    public function editModal(Request $request, $id)
    {
        $sanPham    = $this->sanPham->all();
        $nhaCungCap = $this->nhaCungCap->all();

        // To array keys id
        $sanPhamKeyIds = $this->sanPham->toKeyIds($sanPham);
        $nhaCungCapKeyIds = $this->nhaCungCap->toKeyIds($nhaCungCap);

        $chiTietHoaDonNhapSanPham = $this->chiTietHoaDonNhapSanPham->findByIdDonHangWithNhaCungCapVaSanPham($id);
        $sanPhamTrongHoaDon = [];
        foreach ($chiTietHoaDonNhapSanPham as $item) {
            $sanPhamTrongHoaDon[] = [
                'id_san_pham'      => $item->id_san_pham,
                'ten_san_pham'     => $sanPhamKeyIds[$item->id_san_pham]['san_pham_ten'],
                'so_luong'         => $item->so_luong_san_pham_nhap,
                'don_gia'          => $sanPhamKeyIds[$item->id_san_pham]['san_pham_gia_ban_thuc_te'],
                'id_nha_cung_cap'  => $item->id_nha_cung_cap,
                'nha_cung_cap_ten' => $nhaCungCapKeyIds[$item->id_nha_cung_cap]['nha_cung_cap_ten'],
            ];
        }

        return [
            'view' => view('admin.hoa_don_nhap_hang.partials.modals.edit', compact('sanPham', 'nhaCungCap', 'chiTietHoaDonNhapSanPham', 'id'))->render(),
            'sanPhamTrongHoaDon' => $sanPhamTrongHoaDon,
        ];
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $dateHienTai = now();
            $user = Auth::guard('admin')->user();
            //Buớc 1, trù các sản phảm đã nhập ở hoá đơn truớc
            $chiTietHoaDonNhapSanPham = $this->chiTietHoaDonNhapSanPham->getByIdHoaDonNhapSanPham($id);
            foreach ($chiTietHoaDonNhapSanPham as $item) {
                $sanPham = $this->sanPham->findById($item->id_san_pham);
                if (!empty($sanPham)) {
                    $sanPham->san_pham_so_luong = $sanPham->san_pham_so_luong - $item->so_luong_san_pham_nhap;
                    $sanPham->save();
                }
                //Lưu các giá trị vào log
                $this->logHoaDonNhapHang->create([
                    'id_san_pham'               => $item->id_san_pham,
                    'so_luong_san_pham_nhap'    => $item->so_luong_san_pham_nhap,
                    'don_gia_nhap_san_pham'     => $item->don_gia_nhap_san_pham,
                    'id_nha_cung_cap'           => $item->id_nha_cung_cap,
                    'id_hoa_don_nhap_hang'      => $id,
                    'ngay_thay_doi'             => $dateHienTai . '',
                    'email_cap_nhat'            => $user->email,
                ]);
            }

            $this->chiTietHoaDonNhapSanPham->deleteByIdHoaDonNhapSanPham($id);
            //Buớc 2, cộng các sản phẩm đã nhập ở hoá đơn hiện tại
            $data = $request->all();
            foreach ($data as $item) {
                // Thêm vào bảng chi tiết hoá đơn nhập sản phẩm
                $this->chiTietHoaDonNhapSanPham->create([
                    'id_san_pham'               => $item['id_san_pham'],
                    'so_luong_san_pham_nhap'    => $item['so_luong'],
                    'don_gia_nhap_san_pham'     => $item['don_gia'],
                    'id_nha_cung_cap'           => $item['id_nha_cung_cap'],
                    'id_hoa_don_nhap_san_pham'  => $id,
                ]);

                // Cập nhật lại số lượng sản phẩm đó
                $sanPham = $this->sanPham->findById($item['id_san_pham']);
                $sanPham->san_pham_so_luong += $item['so_luong'];
                $sanPham->save();
            }

            DB::commit();

            return return_message('toastr', 'success', 'Cập nhật thành công');
        } catch (Exception $ex) {
            \Log::info($ex->getMessage());

            DB::rollback();

            return return_message('toastr', 'error', 'Có lỗi xảy ra');
        }
    }
}
