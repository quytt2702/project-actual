<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\Admin\CaiDatRepository;
use App\Validators\Admin\CaiDat\UpdateCaiDatValidator;

class CaiDatController extends Controller
{
    protected $caiDat;

    public function __construct(CaiDatRepository $caiDat)
    {
        $this->caiDat = $caiDat;
    }

    public function index(Request $request)
    {
        $caiDat = $this->caiDat->getConfig();

        return view('admin.cai_dat.index', compact('caiDat'));
    }

    public function edit(Request $request, UpdateCaiDatValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $caiDat = $this->caiDat->getConfig();
        $caiDat->email                      = $data['email'];
        $caiDat->email_password             = $data['email_password'];
        $caiDat->so_lan_nap_sai_lien_tuc    = $data['so_lan_nap_sai_lien_tuc'];
        $caiDat->don_hang_dau               = $data['don_hang_dau'];
        $caiDat->don_hang_sau               = $data['don_hang_sau'];
        $caiDat->phi_ship_ctv               = $data['phi_ship_ctv'];
        $caiDat->phi_ship_cod               = $data['phi_ship_cod'];
        $caiDat->phi_ship_ngan_luong        = $data['phi_ship_ngan_luong'];
        $caiDat->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }
}
