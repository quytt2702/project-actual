<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entities\Url;
use App\Entities\ChuyenMuc;
use App\Repositories\Contracts\UrlRepository;
use App\Repositories\Contracts\NgonNguRepository;
use App\Repositories\Contracts\ChuyenMucRepository;
use App\Validators\Admin\ChuyenMuc\StoreChuyenMucValidator;
use App\Validators\Admin\ChuyenMuc\UpdateChuyenMucValidator;
use App\Validators\Admin\ChuyenMuc\DestroyChuyenMucValidator;

class ChuyenMucController extends Controller
{
    protected $url;
    protected $ngonNgu;
    protected $chuyenMuc;

    public function __construct(
        UrlRepository $url,
        NgonNguRepository $ngonNgu,
        ChuyenMucRepository $chuyenMuc
    ) {
        $this->url          = $url;
        $this->ngonNgu      = $ngonNgu;
        $this->chuyenMuc    = $chuyenMuc;
    }

    public function index(Request $request)
    {
        $ngonNgu = $this->ngonNgu->getIsOpen();

        return view('admin.chuyen_muc.index', compact('ngonNgu'));
    }

    public function table(Request $request)
    {
        $chuyenMuc = $this->chuyenMuc->allWithNgonNgu();

        return view('admin.chuyen_muc.partials.body-table', compact('chuyenMuc'));
    }

    public function store(Request $request, StoreChuyenMucValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $this->chuyenMuc->create([
            'ten_chuyen_muc' => $data['ten_chuyen_muc'],
            'url'            => $data['url'],
            'id_ngon_ngu'    => $data['id_ngon_ngu'],
            'is_active'      => ($data['is_active'] === true) ? ChuyenMuc::IS_ACTIVE['YES'] : ChuyenMuc::IS_ACTIVE['NO']
        ]);

        // Thêm vào table url tổng
        $this->url->create([
            'url_url'       => $data['url'],
            'url_ten_loai'  => Url::TEN_LOAI['CM_BAI_VIET'],
            'id_ngon_ngu'   => $data['id_ngon_ngu'],
        ]);

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function destroy(Request $request, $id, DestroyChuyenMucValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $chuyenMuc = $this->chuyenMuc->findById($id);
        $chuyenMuc->delete();

        // Xoá Url ở table Url
        $url = $this->url->deleteIfExist($chuyenMuc->url);

        return return_message('toastr', 'success', trans('notification.delete.success'));
    }

    public function editModal(Request $request, $id, DestroyChuyenMucValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $ngonNgu   = $this->ngonNgu->all();
        $chuyenMuc = $this->chuyenMuc->findWithNgonNgu($id);

        return view('admin.chuyen_muc.partials.change-modal', compact('ngonNgu', 'chuyenMuc', 'id'));
    }

    public function update(Request $request, $id, UpdateChuyenMucValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $chuyenMuc = $this->chuyenMuc->findById($id);
        $checkUrl = $this->url->findByUrl($data['url']);

        if (!empty($checkUrl) && $chuyenMuc->url !== $checkUrl->url_url) {
            return validate_errors(['URL đã tồn tại']);
        }

        // Kiểm tra url đã có chưa, nếu chưa thì tạo mới
        $url = $this->url->findByUrl($data['url']);
        if (empty($url)) {
            $this->url->create([
                'url_url'       => $data['url'],
                'url_ten_loai'  => Url::TEN_LOAI['CM_BAI_VIET'],
            ]);
        }

        // Xoá Url cũ
        $this->url->deleteByUrl($chuyenMuc->url);

        $chuyenMuc->ten_chuyen_muc = $data['ten_chuyen_muc'];
        $chuyenMuc->url            = $data['url'];
        $chuyenMuc->id_ngon_ngu    = $data['id_ngon_ngu'];
        $chuyenMuc->is_active      = ($data['is_active'] === true) ? ChuyenMuc::IS_ACTIVE['YES'] : ChuyenMuc::IS_ACTIVE['NO'];
        $chuyenMuc->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }
}
