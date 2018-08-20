<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entities\Admin\Admin;
use App\Repositories\Contracts\NhomQuyenRepository;
use App\Repositories\Contracts\Admin\AdminRepository;
use App\Validators\Admin\Admin\StoreAdminValidator;
use App\Validators\Admin\Admin\UpdateAdminValidator;
use App\Validators\Admin\Admin\DestroyAdminValidator;

class NhanVienHeThongController extends Controller
{
    protected $admin;
    protected $nhomQuyen;

    public function __construct(
        AdminRepository $admin,
        NhomQuyenRepository $nhomQuyen
    ) {
        $this->admin     = $admin;
        $this->nhomQuyen = $nhomQuyen;
    }

    public function index(Request $request)
    {
        return view('admin.nhan_vien_he_thong.index');
    }

    public function table(Request $request)
    {
        $admin = $this->admin->getAllWithoutMainAdmin();

        return view('admin.nhan_vien_he_thong.partials.body-table', compact('admin'));
    }

    public function add(Request $request)
    {
        $nhomQuyen = $this->nhomQuyen->getAllNhomQuyen();

        return view('admin.nhan_vien_he_thong.add', compact('nhomQuyen'));
    }

    public function store(Request $request, StoreAdminValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $this->admin->create([
            'email'         => $data['email'],
            'ho_va_ten'     => $data['ho_va_ten'],
            'password'      => bcrypt($data['password']),
            'id_nhom_quyen' => $data['id_nhom_quyen'],
        ]);

        return return_message('toastr', 'success', trans('notification.add.success'), true, route('admin.nhan_vien_he_thong.index'));
    }

    public function destroy(Request $request, $id, DestroyAdminValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $admin = $this->admin->find($id);
        $admin->delete();

        return return_message('toastr', 'success', trans('notification.delete.success'));
    }

    public function block(Request $request, $id, DestroyAdminValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $admin = $this->admin->findById($id);
        $admin->is_block = ($admin->is_block === Admin::IS_BLOCK['YES']) ? Admin::IS_BLOCK['NO'] : Admin::IS_BLOCK['YES'];
        $admin->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }

    public function editModal(Request $request, $id, DestroyAdminValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $admin = $this->admin->find($id);

        return view('admin.nhan_vien_he_thong.partials.change-modal', compact('admin'));
    }

    public function edit(Request $request, $email, UpdateAdminValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('email'));
        $validator->with($data)->passesOrFail();

        // Process
        $admin = $this->admin->findByEmail($email);
        if ($data['password'] !== '') {
            if ($data['password'] !== $data['password_confirmation']) {
                return return_message('toastr', 'error', 'Mật khẩu không chính xác');
            } else {
                $admin->email     = $data['email'];
                $admin->ho_va_ten = $data['ho_va_ten'];
                $admin->password  = bcrypt($data['password']);
            }
        } else {
             $admin->email        = $data['email'];
             $admin->ho_va_ten    = $data['ho_va_ten'];
        }

        $admin->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }
}
