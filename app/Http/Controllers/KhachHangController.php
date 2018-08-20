<?php

namespace App\Http\Controllers;

use DB;
use Uuid;
use Cookie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Jobs\SendMail;
use App\Entities\HoaDonBanHang;

use App\Entities\Landing\LandingTheme;
use App\Repositories\Contracts\WardRepository;
use App\Repositories\Contracts\SanPhamRepository;
use App\Repositories\Contracts\DistrictRepository;
use App\Repositories\Contracts\ProvinceRepository;
use App\Repositories\Contracts\KhachHangRepository;
use App\Repositories\Contracts\CongTacVienRepository;
use App\Repositories\Contracts\Admin\CaiDatRepository;
use App\Repositories\Contracts\HoaDonBanHangRepository;
use App\Repositories\Contracts\KhachHangLandingPageRepository;
use App\Repositories\Contracts\ChiTietHoaDonBanSanPhamRepository;

class KhachHangController extends Controller
{
    protected $phuong;
    protected $caiDat;
    protected $sanPham;
    protected $quanHuyen;
    protected $khachHang;
    protected $tinhThanh;
    protected $congTacVien;
    protected $hoaDonBanHang;
    protected $khachHangLandingPage;
    protected $chiTietHoaDonBanSanPham;

    public function __construct(
        WardRepository $phuong,
        CaiDatRepository $caiDat,
        SanPhamRepository $sanPham,
        DistrictRepository $quanHuyen,
        ProvinceRepository $tinhThanh,
        KhachHangRepository $khachHang,
        CongTacVienRepository $congTacVien,
        HoaDonBanHangRepository $hoaDonBanHang,
        KhachHangLandingPageRepository $khachHangLandingPage,
        ChiTietHoaDonBanSanPhamRepository $chiTietHoaDonBanSanPham
    ) {
        $this->phuong                   = $phuong;
        $this->caiDat                   = $caiDat;
        $this->sanPham                  = $sanPham;
        $this->quanHuyen                = $quanHuyen;
        $this->khachHang                = $khachHang;
        $this->tinhThanh                = $tinhThanh;
        $this->congTacVien              = $congTacVien;
        $this->hoaDonBanHang            = $hoaDonBanHang;
        $this->khachHangLandingPage     = $khachHangLandingPage;
        $this->chiTietHoaDonBanSanPham  = $chiTietHoaDonBanSanPham;
    }

    public function thongBaoModal(Request $request)
    {
        // Validate here
        $data = $request->all();

        // Process
        $url          = $data['url'];
        $landingTheme = LandingTheme::where('url', $url)->first();

        // Lưu thông tin khách hàng landing page
        $hash                      = $request->cookie('ctvid');
        $congTacVienGioiThieu      = $this->congTacVien->findByTxid($hash);
        $emailCongTacVienGioiThieu = empty($congTacVienGioiThieu) ? null : $congTacVienGioiThieu->email;

        $this->khachHang->createIfNotExist([
            'ho_ten'            => $data['ho_ten'],
            'email'             => $data['email'],
            'sdt'               => $data['sdt'],
            'email_ctv'         => $emailCongTacVienGioiThieu,
        ]);

        $khachHangLandingPage = $this->khachHangLandingPage->checkIfNotExit($data['email'], $data['sdt'], $data['url']);
        if (empty($khachHangLandingPage)) {
            $this->khachHangLandingPage->create([
                'ho_ten'            => $data['ho_ten'],
                'email'             => $data['email'],
                'sdt'               => $data['sdt'],
                'ip'                => $request->ip(),
                'email_ctv'         => $emailCongTacVienGioiThieu,
                'link_landing_page' => substr($data['link'], 1),
                'ghi_chu'           => empty($data['ghi_chu']) ? '' : $data['ghi_chu'],
                'yeu_cau_them'      => empty($data['yeu_cau_them']) ? '' : $data['yeu_cau_them'],
            ]);
        }
        // Kết thúc lưu thông tin khách hàng Landing page

        return view('lands.ca.partials.modals.hien_thong_bao', compact('landingTheme'));
    }

    public function chiTietThanhToanModal(Request $request)
    {
        $data = $request->all();
        $url = $request->url;

        $landingTheme = LandingTheme::where('url', $url)->first();
        if ($landingTheme->is_muon_ban === LandingTheme::IS_MUON_BAN['NO']) {
            return 'Vui lòng không can thiệp hệ thống';
        }
        $sanPham = $this->sanPham->findById($landingTheme->san_pham_muon_ban_id);
        $caiDat = $this->caiDat->getConfig();
        $tinhThanh = $this->tinhThanh->getTinhThanh();

        return view('lands.ca.partials.modals.nhap_thong_tin_khach_hang', compact('landingTheme', 'caiDat', 'sanPham', 'tinhThanh', 'data'));
    }

    public function thanhToan(Request $request)
    {
        // Validate
        $data = $request->all();

        if ($data['email']      == '' ||
            $data['ho_ten']     == '' ||
            $data['sdt']        == '' ||
            $data['duong']      == '' ||
            $data['quan_huyen'] == '' ||
            $data['thanh_pho']  == ''
        ) {
            return [
                'title'     => 'Thông báo',
                'message'   => 'Vui lòng điền đầy đủ thông tin',
                'icon'      => 'error',
            ];
        }

        DB::beginTransaction();

        try {
            $landingTheme = LandingTheme::where('url', substr($data['url'], 1))->first();
            if ($landingTheme->is_muon_ban === LandingTheme::IS_MUON_BAN['NO']) {
                return [
                    'title'     => 'Thông báo',
                    'message'   => 'Đề nghị không can thiệp vào hệ thống',
                    'icon'      => 'error',
                ];
            }

            if ($data['phuong_thuc_thanh_toan'] === 'COD') {
                // Xử lý gủi mail
                $url = $data['url'];
                $landingTheme   = LandingTheme::where('url', substr($data['url'], 1))->first();
                $noi_dung_email = $landingTheme->noi_dung_email;
                $noi_dung_email = str_replace('--email--', $data['email'], $noi_dung_email);
                $noi_dung_email = str_replace('--ho_ten--', $data['ho_ten'], $noi_dung_email);
                $noi_dung_email = str_replace('--sdt--', $data['sdt'], $noi_dung_email);

                \Log::info('Gửi mail cho ' . $data['email'] . ' với nội dung mail là ' . $noi_dung_email);
                SendMail::send($data['email'], 'Tiêu đề mail', $noi_dung_email);
                // End xử lý gửi mail

                $this->khachHang->createKhachHang($data, $request);

                $tenPhuong = $this->phuong->findPhuongById($data['phuong']);
                $tenQuan = $this->quanHuyen->findQuanHuyenById($data['quan_huyen']);
                $tenTinh = $this->tinhThanh->findTinhThanhById($data['thanh_pho']);

                $dia_chi_nhan_hang = $data['duong'] . ', ' . $tenPhuong->type. ' '. $tenPhuong->name . ', ' . $tenQuan->type. ' '. $tenQuan->name . ', ' . $tenTinh->type. ' '. $tenTinh->name;
                // $txid = $url_ref_?->txid;
                $txid = $request->cookie('ctvid');
                $email_cong_tac_vien = 'Nobody';
                if (!empty($txid)) {
                    $cong_tac_vien = $this->congTacVien->findByTxid($txid);
                    if (!empty($cong_tac_vien)) {
                        $email_cong_tac_vien = $cong_tac_vien->email;
                    }
                }

                $sanPham   = $this->sanPham->findById($landingTheme->san_pham_muon_ban_id);
                $soLuong   = $data['so_luong'];
                $thanhTien = $sanPham->san_pham_gia_ban_thuc_te * $soLuong;

                \Log::info('Số tiền mua hàng ' . $thanhTien);
                $caiDat = $this->caiDat->getConfig();
                $hoaDonBanHang = $this->hoaDonBanHang->create([
                    'loai_thanh_toan'         => 'COD LandingPage',
                    'email_cong_tac_vien'     => $email_cong_tac_vien,
                    'email_khach_hang_mua'    => $data['email'],
                    'so_tien_mua'             => $thanhTien,
                    'fee_ship'                => $caiDat->phi_ship_cod,
                    'dia_chi_nhan_hang'       => $dia_chi_nhan_hang,
                    'hash'                    => Uuid::generate(4)->string,
                    'trang_thai'              => HoaDonBanHang::TRANG_THAI['CHUA_THANH_TOAN'],
                    'sdt_khach_hang_mua'      => $data['sdt'],
                ]);

                $chiTietHoaDonBanSanPham  =  $this->chiTietHoaDonBanSanPham->create([
                        'id_hoa_don_ban_hang' => $hoaDonBanHang->id,
                        'so_luong'            => $soLuong,
                        'don_gia'             => $sanPham->san_pham_gia_ban_thuc_te,
                        'tong_tien_vnd'       => $thanhTien,
                        'loai_thanh_toan'     => 'COD LandingPage',
                        'id_san_pham'         => $sanPham->id,
                    ]);

                DB::commit();

                return [
                    'title'     => 'Thông báo',
                    'message'   => 'Đã xác nhận mua hàng',
                    'icon'      => 'success',
                ];
            }

            return [
                'title'     => 'Thông báo',
                'message'   => 'Đề nghị không can thiệp vào hệ thống',
                'icon'      => 'error',
            ];
        } catch (Exception $ex) {
            \Log::error($ex->getMessage());

            DB::rollback();
        }
    }
}
