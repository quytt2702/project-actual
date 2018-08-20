<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entities\NhaCungCap;
use App\Repositories\Contracts\NhaCungCapRepository;
use App\Validators\Admin\NhaCungCap\StoreNhaCungCapValidator;
use App\Validators\Admin\NhaCungCap\UpdateNhaCungCapValidator;
use App\Validators\Admin\NhaCungCap\DestroyNhaCungCapValidator;

class NhaCungCapController extends Controller
{
    protected $nhaCungCap;
    protected $paginate = 10;

    public function __construct(NhaCungCapRepository $nhaCungCap)
    {
        $this->nhaCungCap = $nhaCungCap;
    }

    public function index(Request $request)
    {
        return view('admin.nha_cung_cap.index');
    }

    public function add(Request $request)
    {
        return view('admin.nha_cung_cap.add');
    }

    public function list(Request $request, $condition)
    {
        $nhaCungCap = [];
        $trangThai = '';

        if ($condition === 'active') {
            $trangThai  = 'Active';
            $nhaCungCap = $this->nhaCungCap->getActive($this->paginate);
        } else {
            $trangThai  = 'Trash';
            $nhaCungCap = $this->nhaCungCap->getTrash($this->paginate);
        }

        return view('admin.nha_cung_cap.partials.list', compact('nhaCungCap', 'trangThai'));
    }

    public function store(Request $request, StoreNhaCungCapValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $this->nhaCungCap->create([
            'nha_cung_cap_ten'              => $data['nha_cung_cap_ten'],
            'nha_cung_cap_dia_chi'          => $data['nha_cung_cap_dia_chi'],
            'nha_cung_cap_phone_01'         => $data['nha_cung_cap_phone_01'],
            'nha_cung_cap_phone_02'         => $data['nha_cung_cap_phone_02'],
            'nha_cung_cap_is_active'        => ($data['nha_cung_cap_is_active']) ? NhaCungCap::IS_ACTIVE['YES']:NhaCungCap::IS_ACTIVE['NO'],
            'nha_cung_cap_thong_tin_them'   => $data['nha_cung_cap_thong_tin_them'],
            'hinh_anh'                      => $data['hinh_anh'],
        ]);

        return return_message('toastr', 'success', trans('notification.add.success'), true, route('admin.nha_cung_cap.index'));
    }

    public function destroy(Request $request, $id, DestroyNhaCungCapValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $nhaCungCap = $this->nhaCungCap->findByField('id', $id)->first();
        if ($nhaCungCap->nha_cung_cap_is_delete === NhaCungCap::IS_DELETE['NO']) {
            $nhaCungCap->nha_cung_cap_is_delete = NhaCungCap::IS_DELETE['YES'];
            $nhaCungCap->save();
        } else {
            $nhaCungCap->delete();
        }

        return return_message('toastr', 'success', trans('notification.delete.success'));
    }

    public function restore(Request $request, $id, DestroyNhaCungCapValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $nhaCungCap = $this->nhaCungCap->findByField('id', $id)->first();
        $nhaCungCap->nha_cung_cap_is_delete = NhaCungCap::IS_DELETE['NO'];
        $nhaCungCap->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }

    public function edit(Request $request, $id)
    {
        // Validate
        $nhaCungCap = $this->nhaCungCap->findByField('id', $id)->first();
        if (empty($nhaCungCap)) {
            return redirect()->route('admin.nha_cung_cap.index');
        }

        // Process
        if (empty($nhaCungCap)) {
            return redirect()->route('admin.bai_viet.index');
        }

        return view('admin.nha_cung_cap.edit', compact('nhaCungCap'));
    }

    public function update(Request $request, $id, UpdateNhaCungCapValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $nhaCungCap = $this->nhaCungCap->find($id);
        $nhaCungCap->nha_cung_cap_ten            = $data['nha_cung_cap_ten'];
        $nhaCungCap->nha_cung_cap_dia_chi        = $data['nha_cung_cap_dia_chi'];
        $nhaCungCap->nha_cung_cap_phone_01       = $data['nha_cung_cap_phone_01'];
        $nhaCungCap->nha_cung_cap_phone_02       = $data['nha_cung_cap_phone_02'];
        $nhaCungCap->nha_cung_cap_is_active      = ($data['nha_cung_cap_is_active']) ? NhaCungCap::IS_ACTIVE['YES'] : NhaCungCap::IS_ACTIVE['NO'];
        $nhaCungCap->nha_cung_cap_thong_tin_them = $data['nha_cung_cap_thong_tin_them'];
        $nhaCungCap->hinh_anh                    = $data['hinh_anh'];
        $nhaCungCap->save();

        return return_message('toastr', 'success', trans('notification.edit.success'), true, route('admin.nha_cung_cap.index'));
    }

    public function getSearch(Request $request, $search, $condition)
    {
        $search = $request->input_search;

        $nhaCungCap = [];
        $trangThai = '';

        if ($condition === 'Active') {
            $trangThai  = 'Active';
            $nhaCungCap = $this->nhaCungCap->getActiveWithSearch($search, $this->paginate);
        } else {
            $trangThai  = 'Trash';
            $nhaCungCap = $this->nhaCungCap->getTrashWithSearch($search, $this->paginate);
        }

        return view('admin.nha_cung_cap.partials.list', compact('nhaCungCap', 'trangThai'));
    }
}
