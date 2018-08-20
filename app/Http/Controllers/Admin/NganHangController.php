<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

use App\Repositories\Contracts\NganHangRepository;
use App\Validators\Admin\NganHang\NganHangIdValidator;
use App\Validators\Admin\NganHang\StoreNganHangValidator;
use App\Validators\Admin\NganHang\UpdateNganHangValidator;

class NganHangController extends Controller
{
    protected $nganHang;

    public function __construct(NganHangRepository $nganHang)
    {
        $this->nganHang = $nganHang;
    }

    public function index(Request $request)
    {
        return view('admin.ngan_hang.index');
    }

    public function table(Request $request)
    {
        $nganHang = $this->nganHang->all();

        return view('admin.ngan_hang.partials.body-table', compact('nganHang'));
    }

    public function store(Request $request, StoreNganHangValidator $validator)
    {
        // $id_button = 'them_ngan_hang';
        // if (parent::kiemTraQuyen($id_button)) {
        //     return return_message('toastr', 'success', 'Bạn không đủ quyền thực hiện chức năng này!');
        // }

        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $this->nganHang->create([
            'ten_ngan_hang' => $data['ten_ngan_hang']
        ]);

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function destroy(Request $request, $id, NganHangIdValidator $validator)
    {
        // //Check quyền của nút chức năng
        // $id_button = 'xoa_ngan_hang';
        // if (parent::kiemTraQuyen($id_button)) {
        //     return return_message('toastr', 'success', 'Bạn không đủ quyền thực hiện chức năng này!');
        // }
        //Xong check quyền

        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $nganHang = $this->nganHang->find($id);
        $nganHang->delete();

        return return_message('toastr', 'success', trans('notification.delete.success'));
    }

    public function editModal(Request $request, $id, NganHangIdValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $nganHang = $this->nganHang->find($id);

        return view('admin.ngan_hang.partials.change-modal', compact('nganHang'));
    }

    public function update(Request $request, $id, UpdateNganHangValidator $validator)
    {
        // Check quyền của nút chức năng
        $id_button = 'sua_ngan_hang';
        if (parent::kiemTraQuyen($id_button)) {
            return return_message('toastr', 'error', 'Bạn không đủ quyền thực hiện chức năng này!');
        }
        // Xong check quyền

        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $nganHang = $this->nganHang->find($id);
        $nganHang->ten_ngan_hang = $request->ten_ngan_hang;
        $nganHang->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }
}
