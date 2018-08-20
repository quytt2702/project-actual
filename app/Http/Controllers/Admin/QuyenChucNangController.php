<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\ChucNangRepository;
use App\Repositories\Contracts\NhomQuyenRepository;
use App\Repositories\Contracts\QuyenChucNangRepository;
use App\Validators\Admin\QuyenChucNang\IdQuyenValidator;
use App\Validators\Admin\QuyenChucNang\IdQuyenIdChucNangValidator;

class QuyenChucNangController extends Controller
{
    protected $chucNang;
    protected $nhomQuyen;
    protected $quyenChucNang;

    public function __construct(
        ChucNangRepository $chucNang,
        NhomQuyenRepository $nhomQuyen,
        QuyenChucNangRepository $quyenChucNang
    ) {
        $this->chucNang  = $chucNang;
        $this->nhomQuyen = $nhomQuyen;
        $this->quyenChucNang = $quyenChucNang;
    }

    public function index(Request $request)
    {
        $nhomQuyen = $this->nhomQuyen->getAllNhomQuyen();

        return view('admin.quyen_chuc_nang.index', compact('nhomQuyen'));
    }

    public function getChucNang(Request $request, $id_quyen, IdQuyenValidator $validator)
    {
        // Validate
        $data['id_quyen'] = $id_quyen;
        $validator->with($data)->passesOrFail();

        // Process
        $chucNang = $this->chucNang->allWithOrderByDesc();
        $quyenChucNang = [];

        if ($id_quyen > -1) {
            $quyenChucNang = $this->quyenChucNang->findByIdQuyenJoinChucNang($id_quyen)->toArray();
        }

        return view('admin.quyen_chuc_nang.partials.quyen_chuc_nang_body', compact('quyenChucNang', 'chucNang'));
    }

    public function update(Request $request, $quyen_id, $chuc_nang_id, IdQuyenIdChucNangValidator $validator)
    {
        // Validate
        $data['id_quyen']       = $quyen_id;
        $data['id_chuc_nang']   = $chuc_nang_id;
        $validator->with($data)->passesOrFail();

        // Process
        $quyenChucNang = $this->quyenChucNang->findByQuyenIdVaChucNangId($quyen_id, $chuc_nang_id);
        if (empty($quyenChucNang)) {
            $this->quyenChucNang->create([
                'id_quyen' => $quyen_id,
                'id_chuc_nang' => $chuc_nang_id
            ]);

            return return_message('toastr', 'success', trans('notification.edit.success'));
        } else {
            $quyenChucNang->delete();

            return return_message('toastr', 'error', trans('notification.edit.success'));
        }
    }
}
