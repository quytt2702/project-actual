<?php

namespace App\Http\Controllers;

use DB;
use Uuid;
use Auth;
use Cookie;
use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Jobs\SendMail;
use App\Entities\CongTacVien;
use App\Entities\HoaDonBanHang;
use App\Repositories\Contracts\WardRepository;
use App\Repositories\Contracts\GioHangRepository;
use App\Repositories\Contracts\SanPhamRepository;
use App\Repositories\Contracts\DistrictRepository;
use App\Repositories\Contracts\ProvinceRepository;
use App\Repositories\Contracts\KhachHangRepository;
use App\Repositories\Contracts\CongTacVienRepository;
use App\Repositories\Contracts\Admin\CaiDatRepository;
use App\Repositories\Contracts\HoaDonBanHangRepository;
use App\Repositories\Contracts\ChiTietHoaDonBanSanPhamRepository;
use App\Validators\NguoiDung\GioHang\ThanhToanGioHangValidator;

class GioHangController extends Controller
{
    protected $phuong;
    protected $caiDat;
    protected $gioHang;
    protected $sanPham;
    protected $quanHuyen;
    protected $khachHang;
    protected $congTacVien;
    protected $hoaDonBanHang;
    protected $chiTietHoaDonBanSanPham;

    public function __construct(
        WardRepository $phuong,
        CaiDatRepository $caiDat,
        GioHangRepository $gioHang,
        SanPhamRepository $sanPham,
        ProvinceRepository $tinhThanh,
        DistrictRepository $quanHuyen,
        KhachHangRepository $khachHang,
        CongTacVienRepository $congTacVien,
        HoaDonBanHangRepository $hoaDonBanHang,
        ChiTietHoaDonBanSanPhamRepository $chiTietHoaDonBanSanPham
    ) {
        $this->phuong                   = $phuong;
        $this->caiDat                   = $caiDat;
        $this->gioHang                  = $gioHang;
        $this->sanPham                  = $sanPham;
        $this->quanHuyen                = $quanHuyen;
        $this->khachHang                = $khachHang;
        $this->tinhThanh                = $tinhThanh;
        $this->congTacVien              = $congTacVien;
        $this->hoaDonBanHang            = $hoaDonBanHang;
        $this->chiTietHoaDonBanSanPham  = $chiTietHoaDonBanSanPham;
    }

    public function chonKieuThanhToanModal(Request $request)
    {
        return view('sections.layouts.partials.modals.chon_kieu_thanh_toan');
    }

    public function chiTietThanhToanModal(Request $request, $kieu_thanh_toan)
    {
        $data = $request->all();

        DB::beginTransaction();

        try {
            // Kiểu thanh toán cộng tác viên
            if ($kieu_thanh_toan == 1) {
                $user = Auth::guard('cong_tac_vien')->user();
                // Nếu không có người dùng thì chuyển qua trang đăng nhập
                if (empty($user)) {
                    return [
                        'type'    => 1,
                        'message' => 'Đầu tiên bạn phải đăng nhập trước',
                    ];
                }

                // Nếu có người dùng thì chuyển qua trang giỏ hàng
                // Chuyển giỏ hàng từ cookie sang db
                if (!empty($data)) {
                    foreach ($data as $item) {
                        $listSanPham[] = (Object) [
                            'id_san_pham' => $item['san_pham_id'],
                            'so_luong'    => $item['san_pham_so_luong'],
                        ];
                    }
                } else {
                    $listSanPham = json_decode($request->cookie('list_san_pham'));
                }
                $gioHangDB = [];
                foreach ($listSanPham as $item) {
                    $sanPham = $this->sanPham->findById($item->id_san_pham);
                    if (!empty($sanPham)) {
                        $gioHangDB[] = [
                            'san_pham_id'       => $item->id_san_pham,
                            'san_pham_so_luong' => $item->so_luong,
                            'san_pham_ten'      => $sanPham->san_pham_ten
                        ];
                    }
                }

                $gioHang = $this->gioHang->findByEmail($user->email);

                if (empty($gioHang)) {
                    $this->gioHang->create([
                        'gio_hang_email'    => $user->email,
                        'gio_hang_noi_dung' => json_encode($gioHangDB),
                    ]);
                }

                $gioHang->gio_hang_noi_dung = json_encode($gioHangDB);
                $gioHang->save();

                Cookie::queue('list_san_pham', '[]');

                DB::commit();

                return [
                    'type' => 2,
                    'url'  => route('cong_tac_vien.gio_hang.index'),
                ];
            }

            // Kiểu thanh toán bình thường
            $listSanPham = [];
            if (!empty($data)) {
                foreach ($data as $item) {
                    $listSanPham[] = (Object) [
                        'id_san_pham' => $item['san_pham_id'],
                        'so_luong'    => $item['san_pham_so_luong'],
                    ];
                }

                Cookie::queue('list_san_pham', json_encode($listSanPham));
            } else {
                $listSanPham = json_decode($request->cookie('list_san_pham'));
            }
            $tongTien = $this->listSanPhamCookie($listSanPham)['tongTien'];

            $caiDat = $this->caiDat->getConfig();

            $tinhThanh = $this->tinhThanh->getTinhThanh();

            return view('sections.layouts.partials.modals.chi_tiet_gio_hang', compact('tongTien', 'caiDat', 'tinhThanh'));
        } catch (Exception $ex) {
            \Log::error($ex->getMessage());
            dd($ex->getMessage());
        }
    }

    public function store(Request $request, Response $response)
    {
        $data = $request->all();
        $list_san_pham = json_decode($request->cookie('list_san_pham'));

        $is_new = true;
        if (!empty($list_san_pham)) {
            foreach ($list_san_pham as $index => $item) {
                if ($item->id_san_pham === $data['id_san_pham']) {
                    $is_new = false;
                    $list_san_pham[$index]->so_luong = $data['so_luong'];
                }
            }
        }

        if ($is_new) {
            $list_san_pham[] = [
                'id_san_pham' => $data['id_san_pham'],
                'so_luong'    => $data['so_luong'],
            ];
        }

        Cookie::queue('list_san_pham', json_encode($list_san_pham));

        return return_message('toastr', 'success', 'Thêm vào giỏ hàng thành công', true);
    }

    public function listSanPhamCookie($listSanPham)
    {
        $listSanPhamKey = [];
        if (!empty($listSanPham)) {
            // Chuyển list sản phẩm thành list sản phẩm key
            $list_san_pham_array_key = [];
            foreach ($listSanPham as $item) {
                $list_san_pham_array_key[]              = $item->id_san_pham;
                $listSanPhamKey[$item->id_san_pham]     = $item;
            }

            $listSanPham = $this->sanPham->getByIdsWithChuyenMucWithCaiDatNgonNgu($list_san_pham_array_key);
        }

        $tongTien = 0;
        $soLuong = 0;
        if (! empty($listSanPham)) {
            foreach ($listSanPham as $item) {
                $soLuong++;
                $tongTien += $listSanPhamKey[$item->san_pham_id]->so_luong * $item->san_pham_gia_ban_thuc_te;
            }
        }

        return [
            'tongTien'          => $tongTien,
            'listSanPhamKey'    => $listSanPhamKey,
            'listSanPham'       => $listSanPham,
            'soLuong'           => $soLuong,
        ];
    }

    public function guiMailThongBao($id_hoa_don_ban_hang)
    {
         $info = DB::table('hoa_don_ban_hang')
            ->where('hoa_don_ban_hang.id', $id_hoa_don_ban_hang)
            ->join('khach_hang', 'khach_hang.email', 'hoa_don_ban_hang.email_khach_hang_mua')
            ->select('hoa_don_ban_hang.*', 'khach_hang.*', 'hoa_don_ban_hang.created_at as ngay_tao')
            ->first();


        $chiTietDonHang = DB::table('chi_tiet_hoa_don_ban_san_pham')
            ->where('chi_tiet_hoa_don_ban_san_pham.id_hoa_don_ban_hang', $id_hoa_don_ban_hang)
            ->join('san_pham', 'san_pham.id', 'chi_tiet_hoa_don_ban_san_pham.id_san_pham')
            ->get();

        $caiDatChung = DB::table('cai_dat_chung')
            ->first();

        $ngayGiaoHangDuKien = Carbon::parse($info->ngay_tao)->addDays(7);
        $ngayGiaoHangDuKien = substr($ngayGiaoHangDuKien, 0, 10);

        return SendMail::send($info->email_khach_hang_mua, 'Đơn hàng', view('email.don_hang', compact('info', 'chiTietDonHang', 'caiDatChung', 'ngayGiaoHangDuKien'))->render());
    }

    public function thanhToan(Request $request, ThanhToanGioHangValidator $validator)
    {
        // Validate here
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        DB::beginTransaction();

        try {
            if ($data['phuong_thuc_thanh_toan'] === 'COD') {
                $this->khachHang->createKhachHang($data, $request);

                $tenPhuong = $this->phuong->findPhuongById($data['phuong']);
                $tenQuan = $this->quanHuyen->findQuanHuyenById($data['quan_huyen']);
                $tenTinh = $this->tinhThanh->findTinhThanhById($data['thanh_pho']);

                $dia_chi_nhan_hang = $data['duong'] . ', ' . $tenPhuong->type. ' '. $tenPhuong->name . ', ' . $tenQuan->type. ' '. $tenQuan->name . ', ' . $tenTinh->type. ' '. $tenTinh->name;
                $txid = $request->cookie('ctvid');
                $email_cong_tac_vien = 'Nobody';
                if (!empty($txid)) {
                    $cong_tac_vien = $this->congTacVien->findByTxid($txid);
                    if (!empty($cong_tac_vien)) {
                        $email_cong_tac_vien = $cong_tac_vien->email;
                    }
                }

                $listSanPham = json_decode($request->cookie('list_san_pham'));
                $listSanPhamCookie = $this->listSanPhamCookie($listSanPham);

                $caiDat = $this->caiDat->getConfig();
                $hoaDonBanHang = $this->hoaDonBanHang->create([
                    'loai_thanh_toan'       => 'COD TMDT',
                    'email_cong_tac_vien'   => $email_cong_tac_vien,
                    'email_khach_hang_mua'  => $data['email'],
                    'so_tien_mua'           => $listSanPhamCookie['tongTien'],
                    'fee_ship'              => $caiDat->phi_ship_cod,
                    'dia_chi_nhan_hang'     => $dia_chi_nhan_hang,
                    'hash'                  => Uuid::generate(4)->string,
                    'trang_thai'            => HoaDonBanHang::TRANG_THAI['CHUA_THANH_TOAN'],
                    'sdt_khach_hang_mua'    => $data['sdt'],
                ]);

                foreach ($listSanPhamCookie['listSanPham'] as $item) {
                    $so_luong = $listSanPhamCookie['listSanPhamKey'][$item->san_pham_id]->so_luong;
                    $gia_ban = $item->san_pham_gia_ban_thuc_te;
                    $this->chiTietHoaDonBanSanPham->create([
                        'id_hoa_don_ban_hang' => $hoaDonBanHang->id,
                        'so_luong'            => $so_luong,
                        'don_gia'             => $gia_ban,
                        'tong_tien_vnd'       => $so_luong * $gia_ban,
                        'loai_thanh_toan'     => 'COD TMDT',
                        'id_san_pham'         =>  $item->san_pham_id,
                    ]);
                }

                // Gửi mail thông báo về đơn hàng
                $this->guiMailThongBao($hoaDonBanHang->id);

                // Xoá cookie giỏ hàng
                Cookie::queue('list_san_pham', json_encode([]));

                DB::commit();

                return return_message('toastr', 'success', 'Thanh toán thành công', true);
            }

            return return_message('toastr', 'error', 'Có lỗi xảy ra');
        } catch (Exception $ex) {
            \Log::error($ex->getMessage());

            DB::rollback();
        }
    }

    public function destroy(Request $request, Response $response, $id)
    {
        $listSanPham = json_decode($request->cookie('list_san_pham'));
        $listSanPhamNew = [];

        foreach ($listSanPham as $item) {
            if ($item->id_san_pham !== $id) {
                $listSanPhamNew[] = $item;
            }
        }

        $cookie = cookie('list_san_pham', json_encode($listSanPhamNew), 86400);

        return $response->withCookie($cookie);
    }
}
