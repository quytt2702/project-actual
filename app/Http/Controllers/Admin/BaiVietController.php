<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entities\Url;
use App\Entities\BaiViet;
use App\Repositories\Contracts\UrlRepository;
use App\Repositories\Contracts\BaiVietRepository;
use App\Repositories\Contracts\ChuyenMucRepository;
use App\Repositories\Contracts\LichSuBaiVietRepository;
use App\Validators\Admin\BaiViet\StoreBaiVietValidator;
use App\Validators\Admin\BaiViet\UpdateBaiVietValidator;
use App\Validators\Admin\BaiViet\DestroyBaiVietValidator;

class BaiVietController extends Controller
{
    protected $url;
    protected $baiViet;
    protected $chuyenMuc;
    protected $lichSuBaiViet;
    protected $paginate = 10;

    public function __construct(
        UrlRepository $url,
        BaiVietRepository $baiViet,
        ChuyenMucRepository $chuyenMuc,
        LichSuBaiVietRepository $lichSuBaiViet
    ) {
        $this->url           = $url;
        $this->baiViet       = $baiViet;
        $this->chuyenMuc     = $chuyenMuc;
        $this->lichSuBaiViet = $lichSuBaiViet;
    }

    public function index(Request $request)
    {
        return view('admin.bai_viet.index');
    }

    public function add(Request $request)
    {
        $chuyenMuc = $this->chuyenMuc->allWithNgonNgu();

        return view('admin.bai_viet.add', compact('chuyenMuc'));
    }

    public function list(Request $request, $condition)
    {
        $baiViet = [];
        $trangThai = '';

        if ($condition === 'active') {
            $trangThai = 'Active';
            $baiViet = $this->baiViet->getActive($this->paginate);
        } else {
            $trangThai = 'Trash';
            $baiViet = $this->baiViet->getTrash($this->paginate);
        }

        return view('admin.bai_viet.partials.list', compact('baiViet', 'trangThai'));
    }

    public function store(Request $request, StoreBaiVietValidator $validator)
    {
        // Validate
        $tenChuyenMuc = json_decode($request->ten_chuyen_muc);
        $idsChuyenMuc = json_decode($request->id_chuyen_muc);
        $data = array_merge($request->all(), ['ten_chuyen_muc' => $tenChuyenMuc]);
        $data = array_merge($data, ['id_chuyen_muc' => $idsChuyenMuc]);
        foreach ($idsChuyenMuc as $value) {
            if (empty($this->chuyenMuc->findById($value))) {
                return return_error('Lỗi không có id');
            }
        }
        $validator->with($data)->passesOrFail();
        $chuyenMuc = $this->chuyenMuc
            ->find($idsChuyenMuc[0]);

        $id_ngon_ngu = $chuyenMuc->id_ngon_ngu;
        // Process
        $nguoi_dung = Auth::guard('admin')->user();
        $this->baiViet->create([
            'tieu_de'        => $data['tieu_de'],
            'url'            => $data['url'],
            'mo_ta_ngan'     => $data['mo_ta_ngan'],
            'noi_dung'       => $data['noi_dung'],
            'keyword'        => $data['keyword'],
            'tags'           => $data['tags'],
            'ten_chuyen_muc' => $request->ten_chuyen_muc,
            'hinh_dai_dien'  => $data['hinh_dai_dien'],
            'nguoi_tao'      => $nguoi_dung->ho_va_ten,
            'id_nguoi_tao'   => $nguoi_dung->id,
            'id_chuyen_muc'  => $request->id_chuyen_muc,
        ]);

        // Thêm vào table url tổng
        $this->url->create([
            'url_url'       => $data['url'],
            'url_ten_loai'  => Url::TEN_LOAI['BAI_VIET'],
            'id_ngon_ngu'   => $id_ngon_ngu,
        ]);

        return return_message('toastr', 'success', trans('notification.add.success'), true, route('admin.bai_viet.index'));
    }

    public function duyet(Request $request, $id, DestroyBaiVietValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $nguoi_dung = Auth::guard('admin')->user();

        $baiViet = $this->baiViet->findById($id);

        if ($baiViet->is_accept === BaiViet::IS_ACCEPT['NO']) {
            $baiViet->is_accept = BaiViet::IS_ACCEPT['YES'];
            $baiViet->id_nguoi_duyet = $nguoi_dung->id;
            $baiViet->nguoi_duyet = $nguoi_dung->ho_va_ten;
        } else {
            $baiViet->is_accept = BaiViet::IS_ACCEPT['NO'];
            $baiViet->id_nguoi_duyet = null;
            $baiViet->nguoi_duyet = null;
        }

        $baiViet->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }

    public function destroy(Request $request, $id, DestroyBaiVietValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $baiViet = $this->baiViet->findById($id);
        if ($baiViet->is_delete === BaiViet::IS_DELETE['NO']) {
            $baiViet->is_delete = BaiViet::IS_DELETE['YES'];
            $baiViet->save();
        } else {
            $baiViet->delete();

            // Xoá Url ở table Url
            $url = $this->url->deleteIfExist($baiViet->url);
        }

        return return_message('toastr', 'success', trans('notification.delete.success'));
    }

    public function restore(Request $request, $id, DestroyBaiVietValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $baiViet = $this->baiViet->findById($id);
        $baiViet->is_delete = BaiViet::IS_DELETE['NO'];
        $baiViet->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }

    public function edit(Request $request, $id)
    {
        // Validate
        $baiViet = $this->baiViet->findById($id);
        if (empty($baiViet)) {
            return redirect()->route('admin.bai_viet.index');
        }

        // Process
        $chuyenMuc = $this->chuyenMuc->allWithNgonNgu();

        return view('admin.bai_viet.edit', compact('baiViet', 'chuyenMuc'));
    }

    public function update(Request $request, $id, UpdateBaiVietValidator $validator)
    {
        // Validate
        $idsChuyenMuc = json_decode($request->id_chuyen_muc);
        $data = array_merge($request->all(), ['id_chuyen_muc' => $idsChuyenMuc]);
        foreach ($idsChuyenMuc as $value) {
            if (empty($this->chuyenMuc->findById($value))) {
                return return_error('Lỗi không có id');
            }
        }
        $validator->with($data)->passesOrFail();

        $baiViet = $this->baiViet->findById($id);
        $checkUrl = $this->url->findByUrl($data['url']);

        if (!empty($checkUrl) && $baiViet->url !== $checkUrl->url_url) {
            return validate_errors(['URL đã tồn tại']);
        }
        $chuyenMuc = $this->chuyenMuc
            ->find($idsChuyenMuc[0]);

        $id_ngon_ngu = $chuyenMuc->id_ngon_ngu;

        // Kiểm tra url đã có chưa, nếu chưa thì tạo mới
        $url = $this->url->findByUrl($data['url']);
        if (empty($url)) {
            $this->url->create([
                'url_url'       => $data['url'],
                'url_ten_loai'  => Url::TEN_LOAI['BAI_VIET'],
                'id_ngon_ngu'   => $id_ngon_ngu,
            ]);
        }

        // Xoá Url cũ
        $this->url->deleteByUrl($baiViet->url);

        // Process
        $nguoi_dung = Auth::guard('admin')->user();

        // Xét thay đổi
        $thayDoi = '';
        if ($baiViet->tieu_de !== $data['tieu_de']) {
            $thayDoi .= '"Tiêu đề",';
        }
        if ($baiViet->url !== $data['url']) {
            $thayDoi .= '"Url",';
        }
        if ($baiViet->mo_ta_ngan !== $data['mo_ta_ngan']) {
            $thayDoi .= '"Mô tả ngắn",';
        }
        if ($baiViet->noi_dung !== $data['noi_dung']) {
            $thayDoi .= '"Nội dung",';
        }
        if ($baiViet->keyword !== $data['keyword']) {
            $thayDoi .= '"Keyword",';
        }
        if ($baiViet->tags !== $data['tags']) {
            $thayDoi .= '"Tags",';
        }
        if ($baiViet->ten_chuyen_muc !== $data['ten_chuyen_muc']) {
            $thayDoi .= '"Chuyên mục",';
        }
        if ($baiViet->hinh_dai_dien !== $data['hinh_dai_dien']) {
            $thayDoi .= '"Hình đại diện",';
        }

        if (empty($thayDoi)) {
            return return_message('toastr', 'success', 'Bạn không thay đổi bất kì dữ liệu nào!');
        }

        // Cập nhật bài viết
        $baiViet->tieu_de           = $data['tieu_de'];
        $baiViet->url               = $data['url'];
        $baiViet->mo_ta_ngan        = $data['mo_ta_ngan'];
        $baiViet->noi_dung          = $data['noi_dung'];
        $baiViet->keyword           = $data['keyword'];
        $baiViet->tags              = $data['tags'];
        $baiViet->ten_chuyen_muc    = $data['ten_chuyen_muc'];
        $baiViet->hinh_dai_dien     = $data['hinh_dai_dien'];
        $baiViet->nguoi_cap_nhat    = $nguoi_dung->ho_va_ten;
        $baiViet->id_nguoi_cap_nhat = $nguoi_dung->id;
        $baiViet->id_chuyen_muc     = $request->id_chuyen_muc;
        $baiViet->save();

        $thayDoi = '[' . substr($thayDoi, 0, strlen($thayDoi) - 1) . ']';

        // Thêm vào lịch sử
        $baiVietMoi = [
            'id_bai_viet'       => $baiViet->id,
            'tieu_de'           => $baiViet->tieu_de,
            'url'               => $baiViet->url,
            'mo_ta_ngan'        => $baiViet->mo_ta_ngan,
            'noi_dung'          => $baiViet->noi_dung,
            'keyword'           => $baiViet->keyword,
            'tags'              => $baiViet->tags,
            'ten_chuyen_muc'    => $baiViet->ten_chuyen_muc,
            'hinh_dai_dien'     => $baiViet->hinh_dai_dien,
            'nguoi_cap_nhat'    => $baiViet->nguoi_cap_nhat,
            'id_nguoi_cap_nhat' => $baiViet->id_nguoi_cap_nhat,
            'id_nguoi_tao'      => $baiViet->id_nguoi_tao,
            'id_chuyen_muc'     => $baiViet->id_chuyen_muc,
            'thay_doi'          => $thayDoi,
        ];

        $this->lichSuBaiViet->create($baiVietMoi);

        return return_message('toastr', 'success', trans('notification.edit.success'), true, route('admin.bai_viet.index'));
    }

    public function getSearch(Request $request, $search, $condition)
    {
        $search = $request->input_search;

        $baiViet = [];
        $trangThai = '';

        if ($condition === 'Active') {
            $trangThai = 'Active';
            $baiViet = $this->baiViet->getActiveWithSearch($search, $this->paginate);
        } else {
            $trangThai = 'Trash';
            $baiViet = $this->baiViet->getTrashWithSearch($search, $this->paginate);
        }

        return view('admin.bai_viet.partials.list', compact('baiViet', 'trangThai'));
    }
}
