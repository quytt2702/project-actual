<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\UrlRepository;
use App\Validators\Admin\ThongTinWeb\ThongTinWebValidator;

class ThongTinWebController extends Controller
{
    protected $url;

    public function __construct(UrlRepository $url)
    {
        $this->url = $url;
    }

    public function gioiThieuLavion(Request $request)
    {
        $noiDung = $this->url->findByUrl('gioi-thieu-lavion');

        return view('admin.thong_tin_web.gioi_thieu_lavion', compact('noiDung'));
    }

    public function editGioiThieuLavion(Request $request, ThongTinWebValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $noiDung = $this->url->findByUrl('gioi-thieu-lavion');
        $noiDung->url_noi_dung = $data['url_noi_dung'];
        $noiDung->save();

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function thongTinLienHe(Request $request)
    {
        $noiDung = $this->url->findByUrl('thong-tin-lien-he');

        return view('admin.thong_tin_web.thong_tin_lien_he', compact('noiDung'));
    }

    public function editThongTinLienHe(Request $request, ThongTinWebValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $noiDung = $this->url->findByUrl('thong-tin-lien-he');
        $noiDung->url_noi_dung = $data['url_noi_dung'];
        $noiDung->save();

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function dieuKhoanSuDung(Request $request)
    {
        $noiDung = $this->url->findByUrl('dieu-khoan-su-dung');

        return view('admin.thong_tin_web.dieu_khoan_su_dung', compact('noiDung'));
    }

    public function editDieuKhoanSuDung(Request $request, ThongTinWebValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $noiDung = $this->url->findByUrl('dieu-khoan-su-dung');
        $noiDung->url_noi_dung = $data['url_noi_dung'];
        $noiDung->save();

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function moHinhKinhDoanh(Request $request)
    {
        $noiDung = $this->url->findByUrl('mo-hinh-kinh-doanh');

        return view('admin.thong_tin_web.mo_hinh_kinh_doanh', compact('noiDung'));
    }

    public function editMoHinhKinhDoanh(Request $request, ThongTinWebValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $noiDung = $this->url->findByUrl('mo-hinh-kinh-doanh');
        $noiDung->url_noi_dung = $data['url_noi_dung'];
        $noiDung->save();

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function dichVuKhachHang(Request $request)
    {
        $noiDung = $this->url->findByUrl('dich-vu-khach-hang');

        return view('admin.thong_tin_web.dich_vu_khach_hang', compact('noiDung'));
    }

    public function editDichVuKhachHang(Request $request, ThongTinWebValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $noiDung = $this->url->findByUrl('dich-vu-khach-hang');
        $noiDung->url_noi_dung = $data['url_noi_dung'];
        $noiDung->save();

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function dieuKhoanVaHopDongCTV(Request $request)
    {
        $noiDung = $this->url->findByUrl('dieu-khoan-va-hop-dong-ctv');

        return view('admin.thong_tin_web.dieu_khoan_va_hop_dong_ctv', compact('noiDung'));
    }

    public function editDieuKhoanVaHopDongCTV(Request $request, ThongTinWebValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $noiDung = $this->url->findByUrl('dieu-khoan-va-hop-dong-ctv');
        $noiDung->url_noi_dung = $data['url_noi_dung'];
        $noiDung->save();

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function hoiVaDap(Request $request)
    {
        $noiDung = $this->url->findByUrl('hoi-va-dap');

        return view('admin.thong_tin_web.hoi_va_dap', compact('noiDung'));
    }

    public function editHoiVaDap(Request $request, ThongTinWebValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $noiDung = $this->url->findByUrl('hoi-va-dap');
        $noiDung->url_noi_dung = $data['url_noi_dung'];
        $noiDung->save();

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function chinhSachBanHang(Request $request)
    {
        $noiDung = $this->url->findByUrl('chinh-sach-ban-hang');

        return view('admin.thong_tin_web.chinh_sach_ban_hang', compact('noiDung'));
    }

    public function editChinhSachBanHang(Request $request, ThongTinWebValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $noiDung = $this->url->findByUrl('chinh-sach-ban-hang');
        $noiDung->url_noi_dung = $data['url_noi_dung'];
        $noiDung->save();

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function chinhSachBaoMat(Request $request)
    {
        $noiDung = $this->url->findByUrl('chinh-sach-bao-mat');

        return view('admin.thong_tin_web.chinh_sach_bao_mat', compact('noiDung'));
    }

    public function editChinhSachBaoMat(Request $request, ThongTinWebValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $noiDung = $this->url->findByUrl('chinh-sach-bao-mat');
        $noiDung->url_noi_dung = $data['url_noi_dung'];
        $noiDung->save();

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function chinhSachGiaoHang(Request $request)
    {
        $noiDung = $this->url->findByUrl('chinh-sach-giao-hang');

        return view('admin.thong_tin_web.chinh_sach_giao_hang', compact('noiDung'));
    }

    public function editChinhSachGiaoHang(Request $request, ThongTinWebValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $noiDung = $this->url->findByUrl('chinh-sach-giao-hang');
        $noiDung->url_noi_dung = $data['url_noi_dung'];
        $noiDung->save();

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function chinhSachDoiHang(Request $request)
    {
        $noiDung = $this->url->findByUrl('chinh-sach-doi-hang');

        return view('admin.thong_tin_web.chinh_sach_doi_hang', compact('noiDung'));
    }

    public function editChinhSachDoiHang(Request $request, ThongTinWebValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $noiDung = $this->url->findByUrl('chinh-sach-doi-hang');
        $noiDung->url_noi_dung = $data['url_noi_dung'];
        $noiDung->save();

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function chinhSachBaoHanh(Request $request)
    {
        $noiDung = $this->url->findByUrl('chinh-sach-bao-hanh');

        return view('admin.thong_tin_web.chinh_sach_bao_hanh', compact('noiDung'));
    }

    public function editChinhSachBaoHanh(Request $request, ThongTinWebValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $noiDung = $this->url->findByUrl('chinh-sach-bao-hanh');
        $noiDung->url_noi_dung = $data['url_noi_dung'];
        $noiDung->save();

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function chinhSachThanhToan(Request $request)
    {
        $noiDung = $this->url->findByUrl('chinh-sach-thanh-toan');

        return view('admin.thong_tin_web.chinh_sach_thanh_toan', compact('noiDung'));
    }

    public function editChinhSachThanhToan(Request $request, ThongTinWebValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $noiDung = $this->url->findByUrl('chinh-sach-thanh-toan');
        $noiDung->url_noi_dung = $data['url_noi_dung'];
        $noiDung->save();

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function chuongTrinhCtvOnline(Request $request)
    {
        $noiDung = $this->url->findByUrl('chuong-trinh-ctv-online');

        return view('admin.thong_tin_web.chuong_trinh_ctv_online', compact('noiDung'));
    }

    public function editChuongTrinhCtvOnline(Request $request, ThongTinWebValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $noiDung = $this->url->findByUrl('chuong-trinh-ctv-online');
        $noiDung->url_noi_dung = $data['url_noi_dung'];
        $noiDung->save();

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function codeNapTien(Request $request)
    {
        $noiDung = $this->url->findByUrl('code-nap-tien');

        return view('admin.thong_tin_web.code_nap_tien', compact('noiDung'));
    }

    public function editCodeNapTien(Request $request, ThongTinWebValidator $validator)
    {
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $noiDung = $this->url->findByUrl('code-nap-tien');
        $noiDung->url_noi_dung = $data['url_noi_dung'];
        $noiDung->save();

        return return_message('toastr', 'success', trans('notification.add.success'));
    }
}
