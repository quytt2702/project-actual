<?php

namespace App\Http\Controllers\CongTacVien;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entities\CodeNapDiem;
use App\Entities\LogLichSuNapDiemBangCard;
use App\Repositories\Contracts\CodeNapDiemRepository;
use App\Repositories\Contracts\Admin\CaiDatRepository;
use App\Repositories\Contracts\TienNguoiDungRepository;
use App\Repositories\Contracts\HoaDonBanHangRepository;
use App\Validators\CongTacVien\NapDiem\StoreNapDiemValidator;
use App\Repositories\Contracts\ChiTietHoaDonBanSanPhamRepository;
use App\Repositories\Contracts\LogLichSuNapDiemBangCardRepository;

class NapDiemController extends Controller
{
    protected $caiDat;
    protected $codeNapDiem;
    protected $hoaDonBanHang;
    protected $tienNguoiDung;
    protected $chiTietHoaDon;
    protected $logLichSuNapDiemBangCard;
    protected $paginate = 10;

    public function __construct(
        CaiDatRepository $caiDat,
        CodeNapDiemRepository $codeNapDiem,
        HoaDonBanHangRepository $hoaDonBanHang,
        TienNguoiDungRepository $tienNguoiDung,
        LogLichSuNapDiemBangCardRepository $logLichSuNapDiemBangCard,
        ChiTietHoaDonBanSanPhamRepository  $chiTietHoaDon
    ) {
        $this->caiDat                       = $caiDat;
        $this->codeNapDiem                  = $codeNapDiem;
        $this->tienNguoiDung                = $tienNguoiDung;
        $this->hoaDonBanHang                = $hoaDonBanHang;
        $this->chiTietHoaDon                = $chiTietHoaDon;
        $this->logLichSuNapDiemBangCard     = $logLichSuNapDiemBangCard;
    }

    public function index(Request $request)
    {
        return view('cong_tac_vien.nap_diem.index');
    }

    public function table(Request $request)
    {
        $user = Auth::guard('cong_tac_vien')->user();

        $lichSuNapDiem = $this->logLichSuNapDiemBangCard->getByEmail($user->email, $this->paginate);

        return view('cong_tac_vien.nap_diem.partials.lich_su_nap_table', compact('lichSuNapDiem'));
    }

    public function nap(Request $request, StoreNapDiemValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        $user = Auth::guard('cong_tac_vien')->user();

        $codeNapDiem = $this->codeNapDiem->findByMaVaSeri($data['ma_nap_diem'], $data['seri']);
        $lastLogLichSuNapDiem = $this->logLichSuNapDiemBangCard->getLastByEmail($user->email);
        $so_lan_that_bai_lien_tuc = empty($lastLogLichSuNapDiem) ? 0: $lastLogLichSuNapDiem->so_lan_that_bai_lien_tuc;

        // Nếu số lần thất bại liên tục thì ko nạp đc nữa
        $caiDat = $this->caiDat->getConfig();
        if ($so_lan_that_bai_lien_tuc > $caiDat->so_lan_nap_sai_lien_tuc) {
            return return_message('toastr', 'error', 'Bạn đã nạp điểm thất bại quá số lần quy định.');
        }

        if (!empty($codeNapDiem) && $codeNapDiem->is_active === CodeNapDiem::IS_ACTIVE['NO']) {
            return return_message('toastr', 'error', 'Thẻ này đã bị khoá, vui lòng liên lạc nhà cung cấp!.');
        }

        if (empty($codeNapDiem) || $codeNapDiem->trang_thai === CodeNapDiem::TRANG_THAI['DONE'] || $codeNapDiem->is_active === CodeNapDiem::IS_ACTIVE['NO']) {
            $temp = [
                'so_lan_that_bai_lien_tuc'  => $so_lan_that_bai_lien_tuc + 1,
                'email_nap_diem'            => $user->email,
                'seri'                      => $data['seri'],
                'ma_nap'                    => $data['ma_nap_diem'],
                'trang_thai'                => LogLichSuNapDiemBangCard::TRANG_THAI['NO'],
                'so_diem'                   => 0,
            ];

            $this->logLichSuNapDiemBangCard->create($temp);

            return return_message('toastr', 'error', 'Nạp điểm thất bại');
        } else {
            $this->logLichSuNapDiemBangCard->create([
                'so_lan_that_bai_lien_tuc'  => 0,
                'email_nap_diem'            => $user->email,
                'seri'                      => $data['seri'],
                'ma_nap'                    => $data['ma_nap_diem'],
                'trang_thai'                => LogLichSuNapDiemBangCard::TRANG_THAI['YES'],
                'so_diem'                   => $codeNapDiem->so_diem,
                'hide_hash'                 => $codeNapDiem->hide_hash,
            ]);

            $codeNapDiem->trang_thai        = CodeNapDiem::TRANG_THAI['DONE'];
            $codeNapDiem->email_nguoi_nap   = $user->email;
            $codeNapDiem->ngay_nap          = now();
            $codeNapDiem->save();

            $tienNguoiDung = $this->tienNguoiDung->findByEmail($user->email);
            if (empty($tienNguoiDung)) {
                $this->tienNguoiDung->create([
                    'email' => $user->email,
                    'the_milk' => $codeNapDiem->so_diem,
                ]);
            } else {
                $tienNguoiDung->the_milk += $codeNapDiem->so_diem;
                $tienNguoiDung->save();
            }

            return return_message('toastr', 'success', 'Nạp điểm thành công');
        }
    }

    public function getSearch(Request $request)
    {
        $search = $request->input_search;
        $user = Auth::guard('cong_tac_vien')->user();

        $lichSuNapDiem = $this->logLichSuNapDiemBangCard->getByEmailWithSearch($user->email, $search, $this->paginate);

        return view('cong_tac_vien.nap_diem.partials.lich_su_nap_table', compact('lichSuNapDiem'));
    }

    public function getLichSuMuaHangBangMilk(Request $request)
    {
        $user = Auth::guard('cong_tac_vien')->user();
        $hoaDonBanHang = $this->hoaDonBanHang->getByMilkAndEmail($user->email, $this->paginate);

        return view('cong_tac_vien.nap_diem.partials.lich_su_mua_hang_bang_milk', compact('hoaDonBanHang'));
    }

    public function show($id)
    {
        $chiTietHoaDon = $this->chiTietHoaDon->getByIdHoaDonBanHangWithSanPham($id);

        return view('cong_tac_vien.nap_diem.partials.show_detail', compact('chiTietHoaDon'));
    }
}
