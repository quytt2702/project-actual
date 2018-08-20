<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\Admin\CaiDatRepository;
use App\Validators\Admin\ChinhSachCTV\UpdateChinhSachCTVValidator;

class ChinhSachCTVController extends Controller
{
    protected $caiDat;

    public function __construct(CaiDatRepository $caiDat)
    {
        $this->caiDat = $caiDat;
    }

    public function index(Request $request)
    {
        $caiDat = $this->caiDat->getConfig();

        return view('admin.chinh_sach_ctv.index', compact('caiDat'));
    }

    public function edit(Request $request, UpdateChinhSachCTVValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $caiDat = $this->caiDat->getConfig();
        $caiDat->thuong_gioi_thieu_dang_ky          = $data['thuong_gioi_thieu_dang_ky'];
        $caiDat->phan_tram_thuong_doanh_thu_cap_1   = $data['phan_tram_thuong_doanh_thu_cap_1'];
        $caiDat->phan_tram_thuong_doanh_thu_cap_2   = $data['phan_tram_thuong_doanh_thu_cap_2'];
        $caiDat->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }
}
