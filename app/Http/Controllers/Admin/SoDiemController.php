<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entities\SoDiem;
use App\Repositories\Contracts\SoDiemRepository;
use App\Validators\Admin\SoDiem\CheckIdValidator;
use App\Validators\Admin\SoDiem\CreateSoDiemValidator;
use App\Validators\Admin\SoDiem\UpdateSoDiemValidator;

class SoDiemController extends Controller
{
    protected $soDiem;

    public function __construct(SoDiemRepository $soDiem)
    {
        $this->soDiem = $soDiem;
    }

    public function index()
    {
        return view('admin.so_diem.index');
    }

    public function table()
    {
        $soDiem = $this->soDiem->getLatest();

        return view('admin.so_diem.partials.body_table', compact('soDiem'));
    }

    public function store(Request $request, CreateSoDiemValidator $validator)
    {
        $validator->with($request->all())->passesOrFail();

        $this->soDiem->create([
            'noi_dung' => $request->noi_dung,
            'so_diem'  => $request->so_diem
        ]);

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function kickHoat(Request $request, $id, CheckIdValidator $validator)
    {
        $data['id'] = $id;
        $validator->with($data)->passesOrFail();

        $soDiem = $this->soDiem->find($id);

        $soDiem->kich_hoat = ($soDiem->kich_hoat === SoDiem::KICH_HOAT['YES'])
            ? SoDiem::KICH_HOAT['NO']
            : SoDiem::KICH_HOAT['YES'];
        $soDiem->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }

    public function destroy($id, CheckIdValidator $validator)
    {
        $data['id'] = $id;
        $validator->with($data)->passesOrFail();

        $this->soDiem->delete($id);
        return return_message('toastr', 'success', trans('notification.delete.success'));
    }

    public function edit($id, CheckIdValidator $validator)
    {
        $data['id'] = $id;
        $validator->with($data)->passesOrFail();

        $soDiem = $this->soDiem->find($id);
        return view('admin.so_diem.partials.edit_modal', compact('soDiem'));
    }

    public function update(Request $request, $id, UpdateSoDiemValidator $validator)
    {
        $validator->with($request->all())->passesOrFail();

        $soDiem = $this->soDiem->find($id);
        $soDiem->noi_dung   = $request->noi_dung;
        $soDiem->so_diem    = $request->so_diem;
        $soDiem->kich_hoat  = $request->kich_hoat ? SoDiem::KICH_HOAT['YES'] : SoDiem::KICH_HOAT['NO'];
        $soDiem->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }
}
