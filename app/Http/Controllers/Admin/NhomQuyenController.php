<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\NhomQuyenRepository;
use App\Validators\Admin\NhomQuyen\StoreNhomQuyenValidator;
use App\Validators\Admin\NhomQuyen\UpdateNhomQuyenValidator;
use App\Validators\Admin\NhomQuyen\DestroyNhomQuyenValidator;

class NhomQuyenController extends Controller
{
    protected $nhomQuyen;

    public function __construct(NhomQuyenRepository $nhomQuyen)
    {
        $this->nhomQuyen = $nhomQuyen;
    }

    public function index(Request $request)
    {
        return view('admin.nhom_quyen.index');
    }

    public function table(Request $request)
    {
        $nhomQuyen = $this->nhomQuyen->all();

        return view('admin.nhom_quyen.partials.body-table', compact('nhomQuyen'));
    }

    public function store(Request $request, StoreNhomQuyenValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $this->nhomQuyen->create([
            'ten_nhom' => $data['ten_nhom'],
            'mo_ta' => $data['mo_ta']
        ]);

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function destroy(Request $request, $id, DestroyNhomQuyenValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $nhomQuyen = $this->nhomQuyen->find($id);
        $nhomQuyen->delete();

        return return_message('toastr', 'success', trans('notification.delete.success'));
    }

    public function editModal(Request $request, $id, DestroyNhomQuyenValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $nhomQuyen = $this->nhomQuyen->find($id);

        return view('admin.nhom_quyen.partials.change-modal', compact('nhomQuyen'));
    }

    public function edit(Request $request, $id, UpdateNhomQuyenValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $nhomQuyen = $this->nhomQuyen->find($id);
        $nhomQuyen->ten_nhom = $data['ten_nhom'];
        $nhomQuyen->mo_ta = $data['mo_ta'];
        $nhomQuyen->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }
}
