<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entities\Url;
use App\Entities\ChuyenMucSanPham;
use App\Repositories\Contracts\UrlRepository;
use App\Repositories\Contracts\NgonNguRepository;
use App\Repositories\Contracts\ChuyenMucSanPhamRepository;
use App\Validators\Admin\ChuyenMucSanPham\StoreChuyenMucSanPhamValidator;
use App\Validators\Admin\ChuyenMucSanPham\UpdateChuyenMucSanPhamValidator;
use App\Validators\Admin\ChuyenMucSanPham\DestroyChuyenMucSanPhamValidator;

class ChuyenMucSanPhamController extends Controller
{
    protected $url;
    protected $chuyenMucSanPham;

    public function __construct(
        UrlRepository $url,
        NgonNguRepository $ngonNgu,
        ChuyenMucSanPhamRepository $chuyenMucSanPham
    ) {
        $this->url              = $url;
        $this->ngonNgu          = $ngonNgu;
        $this->chuyenMucSanPham = $chuyenMucSanPham;
    }

    public function index(Request $request)
    {
        $ngonNgu = $this->ngonNgu->getIsOpen();

        return view('admin.chuyen_muc_san_pham.index', compact('ngonNgu'));
    }

    public function table(Request $request)
    {
        $chuyenMucSanPham = $this->chuyenMucSanPham->allWithNgonNgu();

        return view('admin.chuyen_muc_san_pham.partials.body-table', compact('chuyenMucSanPham'));
    }

    public function store(Request $request, StoreChuyenMucSanPhamValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $this->chuyenMucSanPham->create([
            'chuyen_muc_san_pham_ten'           => $data['chuyen_muc_san_pham_ten'],
            'chuyen_muc_san_pham_url'           => $data['chuyen_muc_san_pham_url'],
            'chuyen_muc_san_pham_id_ngon_ngu'   => $data['chuyen_muc_san_pham_id_ngon_ngu'],
            'chuyen_muc_san_pham_is_active'     => ($data['chuyen_muc_san_pham_is_active'] === 'Active') ? ChuyenMucSanPham::IS_ACTIVE['YES'] : ChuyenMucSanPham::IS_ACTIVE['NO'],
        ]);

        // Thêm vào table url tổng
        $this->url->create([
            'url_url'       => $data['chuyen_muc_san_pham_url'],
            'url_ten_loai'  => Url::TEN_LOAI['CM_SAN_PHAM'],
            'id_ngon_ngu'   => $data['chuyen_muc_san_pham_id_ngon_ngu'],
        ]);

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function destroy(Request $request, $id, DestroyChuyenMucSanPhamValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $chuyenMucSanPham = $this->chuyenMucSanPham->find($id);
        $chuyenMucSanPham->delete();

        // Xoá Url ở table Url
        $url = $this->url->delete($baiViet->url);

        return return_message('toastr', 'success', trans('notification.delete.success'));
    }

    public function editModal(Request $request, $id, DestroyChuyenMucSanPhamValidator $validator)
    {
         // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $ngonNgu            = $this->ngonNgu->getIsOpen();
        $chuyenMucSanPham   = $this->chuyenMucSanPham->find($id);

        return view('admin.chuyen_muc_san_pham.partials.change-modal', compact('chuyenMucSanPham', 'ngonNgu'));
    }

    public function update(Request $request, $id, UpdateChuyenMucSanPhamValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $chuyenMucSanPham = $this->chuyenMucSanPham->find($id);
        $checkUrl = $this->url->findByUrl($data['chuyen_muc_san_pham_url']);

        if (!empty($checkUrl) && $chuyenMucSanPham->chuyen_muc_san_pham_url !== $checkUrl->url_url) {
            return validate_errors(['URL đã tồn tại']);
        }

        // Kiểm tra url đã có chưa, nếu chưa thì tạo mới
        $url = $this->url->findByUrl($data['chuyen_muc_san_pham_url']);
        if (empty($url)) {
            $this->url->create([
                'url_url'       => $data['chuyen_muc_san_pham_url'],
                'url_ten_loai'  => Url::TEN_LOAI['CM_SAN_PHAM'],
            ]);
            // Xoá Url cũ
            $this->url->deleteByUrl($chuyenMucSanPham->chuyen_muc_san_pham_url);
        }


        $chuyenMucSanPham->chuyen_muc_san_pham_ten          = $data['chuyen_muc_san_pham_ten'];
        $chuyenMucSanPham->chuyen_muc_san_pham_url          = $data['chuyen_muc_san_pham_url'];
        $chuyenMucSanPham->chuyen_muc_san_pham_is_active    = ($data['chuyen_muc_san_pham_is_active'] === 'Active') ? ChuyenMucSanPham::IS_ACTIVE['YES'] : ChuyenMucSanPham::IS_ACTIVE['NO'];
        $chuyenMucSanPham->chuyen_muc_san_pham_id_ngon_ngu  = $data['chuyen_muc_san_pham_id_ngon_ngu'];
        $chuyenMucSanPham->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }
}
