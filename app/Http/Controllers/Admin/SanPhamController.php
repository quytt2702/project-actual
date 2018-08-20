<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entities\Url;
use App\Entities\SanPham;
use App\Repositories\Contracts\UrlRepository;
use App\Repositories\Contracts\TabRepository;
use App\Repositories\Contracts\SanPhamRepository;
use App\Repositories\Contracts\ChuyenMucSanPhamRepository;
use App\Repositories\Contracts\Admin\CaiDatNgonNguRepository;
use App\Validators\Admin\SanPham\StoreSanPhamValidator;
use App\Validators\Admin\SanPham\UpdateSanPhamValidator;
use App\Validators\Admin\SanPham\DestroySanPhamValidator;

class SanPhamController extends Controller
{
    protected $url;
    protected $tab;
    protected $sanPham;
    protected $caiDatNgonNgu;
    protected $chuyenMucSanPham;
    protected $paginate = 10;

    public function __construct(
        UrlRepository $url,
        TabRepository $tab,
        SanPhamRepository $sanPham,
        CaiDatNgonNguRepository $caiDatNgonNgu,
        ChuyenMucSanPhamRepository $chuyenMucSanPham
    ) {
        $this->url              = $url;
        $this->tab              = $tab;
        $this->sanPham          = $sanPham;
        $this->caiDatNgonNgu    = $caiDatNgonNgu;
        $this->chuyenMucSanPham = $chuyenMucSanPham;
    }

    public function index(Request $request)
    {
        return view('admin.san_pham.index');
    }

    public function add(Request $request)
    {
        $tabs               = $this->tab->all();
        $chuyenMucSanPham   = $this->chuyenMucSanPham->allWithNgonNguActiveVaChuyenMucSanPhamActive();

        return view('admin.san_pham.add', compact('tabs', 'chuyenMucSanPham'));
    }

    public function store(Request $request, StoreSanPhamValidator $validator)
    {
        // Validate here (san_pham_id_chuyen_muc)
        $data = array_merge($request->all(), ['san_pham_id_chuyen_muc' => json_decode($request->san_pham_id_chuyen_muc)]);
        $validator->with($data)->passesOrFail();

        // Kiểm tra ký tự đặc biệt
        if (!kiem_tra_ky_tu($data['san_pham_mo_ta'], [
            '<td', '</td', '<script', '</script'
        ])) {
            return return_error('Mô tả sản phẩm của bạn có những ký tự đặc biệt không được phép');
        }

        $chuyenMucSanPham = $this->chuyenMucSanPham->findById(
            json_decode($request->san_pham_id_chuyen_muc)[0]
        );
        // Process
        $this->sanPham->create([
            'san_pham_ma'              => $data['san_pham_ma'],
            'san_pham_ten'             => $data['san_pham_ten'],
            'san_pham_gia_ban_ao'      => $data['san_pham_gia_ban_khuyen_mai'],
            'san_pham_gia_ban_thuc_te' => $data['san_pham_gia_ban_thuc_te'],
            'san_pham_keyword'         => $data['san_pham_keyword'],
            'san_pham_mo_ta'           => $data['san_pham_mo_ta'],
            'san_pham_noi_dung_tab_1'  => $data['san_pham_noi_dung_tab_1'],
            'san_pham_noi_dung_tab_2'  => $data['san_pham_noi_dung_tab_2'],
            'san_pham_noi_dung_tab_3'  => $data['san_pham_noi_dung_tab_3'],
            'san_pham_noi_dung_tab_4'  => $data['san_pham_noi_dung_tab_4'],
            'san_pham_noi_dung_tab_5'  => $data['san_pham_noi_dung_tab_5'],
            'san_pham_tags'            => $data['san_pham_tags'],
            'san_pham_url'             => $data['san_pham_url'],
            'san_pham_hinh_dai_dien'   => $data['san_pham_hinh_dai_dien'],
            'san_pham_id_chuyen_muc'   => json_encode($data['san_pham_id_chuyen_muc']),
            'san_pham_is_accept'       => SanPham::IS_ACCEPT['YES'],
            'id_ngon_ngu'              => $chuyenMucSanPham->chuyen_muc_san_pham_id_ngon_ngu,
        ]);

        // Thêm vào table url tổng
        $this->url->create([
            'url_url'       => $data['san_pham_url'],
            'url_ten_loai'  => Url::TEN_LOAI['SAN_PHAM'],
            'id_ngon_ngu'   => $chuyenMucSanPham->chuyen_muc_san_pham_id_ngon_ngu,
        ]);

        return return_message('toastr', 'success', trans('notification.add.success'), true, route('admin.san_pham.index'));
    }

    public function list(Request $request, $condition)
    {
        $sanPham = [];
        $trangThai = '';

        if ($condition === 'active') {
            $trangThai = 'Active';
            $sanPham = $this->sanPham->getActive($this->paginate);
        } else {
            $trangThai = 'Trash';
            $sanPham = $this->sanPham->getTrash($this->paginate);
        }

        return view('admin.san_pham.partials.list', compact('sanPham', 'trangThai'));
    }

    public function duyet(Request $request, $id, DestroySanPhamValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $nguoi_dung = Auth::guard('admin')->user();

        $sanPham = $this->sanPham->findByField('id', $id)->first();
        if ($sanPham->san_pham_is_accept === SanPham::IS_ACCEPT['NO']) {
            $sanPham->san_pham_is_accept        = SanPham::IS_ACCEPT['YES'];
            $sanPham->san_pham_id_nguoi_duyet   = $nguoi_dung->id;
            $sanPham->san_pham_nguoi_duyet      = $nguoi_dung->ho_va_ten;
        } else {
            $sanPham->san_pham_is_accept        = SanPham::IS_ACCEPT['NO'];
            $sanPham->san_pham_id_nguoi_duyet   = null;
            $sanPham->san_pham_nguoi_duyet      = null;
        }
        $sanPham->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }

    public function destroy(Request $request, $id, DestroySanPhamValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $sanPham = $this->sanPham->findByField('id', $id)->first();
        if ($sanPham->san_pham_is_delete === SanPham::IS_DELETE['NO']) {
            $sanPham->san_pham_is_delete = SanPham::IS_DELETE['YES'];
            $sanPham->save();
        } else {
            $sanPham->delete();

            // Xoá Url cũ
            $this->url->deleteByUrl($baiViet->url);
        }

        return return_message('toastr', 'success', trans('notification.delete.success'));
    }

    public function restore(Request $request, $id, DestroySanPhamValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $sanPham = $this->sanPham->findByField('id', $id)->first();
        $sanPham->san_pham_is_delete = SanPham::IS_DELETE['NO'];
        $sanPham->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }

    public function getSearch(Request $request, $search, $condition)
    {
        $search = $request->input_search;

        $sanPham = [];
        $trangThai = '';

        if ($condition === 'Active') {
            $trangThai = 'Active';
            $sanPham = $this->sanPham->getActiveWithSearch($search, $this->paginate);
        } else {
            $trangThai = 'Trash';
            $sanPham = $this->sanPham->getTrashWithSearch($search, $this->paginate);
        }

        return view('admin.san_pham.partials.list', compact('sanPham', 'trangThai'));
    }

    public function edit(Request $request, $id)
    {
        $sanPham          = $this->sanPham->find($id);
        $tabs             = $this->tab->all();
        $chuyenMucSanPham = $this->chuyenMucSanPham->allWithNgonNguActiveVaChuyenMucSanPhamActive();

        return view('admin.san_pham.edit', compact('sanPham', 'tabs', 'chuyenMucSanPham'));
    }

    public function update(Request $request, $id, UpdateSanPhamValidator $validator)
    {
        // Validate
        $parseArrayChuyenMuc = json_decode($request->san_pham_id_chuyen_muc);
        $data = array_merge($request->all(), ['san_pham_id_chuyen_muc' => $parseArrayChuyenMuc]);
        $validator->with($data)->passesOrFail();

        // Kiểm tra ký tự đặc biệt
        if (!kiem_tra_ky_tu($data['san_pham_mo_ta'], [
            '<td', '</td', '<script', '</script'
        ])) {
            return return_error('Mô tả sản phẩm của bạn có những ký tự đặc biệt không được phép');
        }

        $chuyenMucSanPham = $this->chuyenMucSanPham->findById($parseArrayChuyenMuc[0]);

        $sanPham = $this->sanPham->find($id);

        $url                               = $this->url->findByUrl($sanPham->san_pham_url);

        if ($data['san_pham_url'] != $url->url_url && !empty($this->url->findByUrl($data['san_pham_url']))) {
            return validate_errors(['URL đã tồn tại']);
        }

        $url->url_url                      = $data['san_pham_url'];
        $url->save();

        $sanPham->san_pham_ma              = $data['san_pham_ma'];
        $sanPham->san_pham_ten             = $data['san_pham_ten'];
        $sanPham->san_pham_gia_ban_ao      = $data['san_pham_gia_ban_khuyen_mai'];
        $sanPham->san_pham_gia_ban_thuc_te = $data['san_pham_gia_ban_thuc_te'];
        $sanPham->san_pham_keyword         = $data['san_pham_keyword'];
        $sanPham->san_pham_mo_ta           = $data['san_pham_mo_ta'];
        $sanPham->san_pham_noi_dung_tab_1  = $data['san_pham_noi_dung_tab_1'];
        $sanPham->san_pham_noi_dung_tab_2  = $data['san_pham_noi_dung_tab_2'];
        $sanPham->san_pham_noi_dung_tab_3  = $data['san_pham_noi_dung_tab_3'];
        $sanPham->san_pham_noi_dung_tab_4  = $data['san_pham_noi_dung_tab_4'];
        $sanPham->san_pham_noi_dung_tab_5  = $data['san_pham_noi_dung_tab_5'];
        $sanPham->san_pham_tags            = $data['san_pham_tags'];
        $sanPham->san_pham_url             = $data['san_pham_url'];
        $sanPham->san_pham_hinh_dai_dien   = $data['san_pham_hinh_dai_dien'];
        $sanPham->san_pham_id_chuyen_muc   = json_encode($data['san_pham_id_chuyen_muc']);
        $sanPham->id_ngon_ngu              = $chuyenMucSanPham->chuyen_muc_san_pham_id_ngon_ngu;
        $sanPham->save();

        return return_message('toastr', 'success', trans('notification.edit.success'), true, route('admin.san_pham.index'));
    }

    public function search(Request $request, $key)
    {
        $sanPham = $this->sanPham->getSearch($key);

        $convertSanPham = [];
        foreach ($sanPham as $item) {
            $convertSanPham[] = [
                'label' => '[' . $item->san_pham_ma . '] ' . $item->san_pham_ten . ' (' . $item->san_pham_gia_ban_thuc_te . ') VND',
                'value' => $item->san_pham_ten,
                'price' => $item->san_pham_gia_ban_thuc_te,
                'id'    => $item->id,
            ];
        }

        return (count($sanPham) > 0) ? $convertSanPham : [];
    }
}
