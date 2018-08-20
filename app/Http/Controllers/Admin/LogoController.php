<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\Admin\CaiDatRepository;
use App\Validators\Admin\Logo\StoreLogoValidator;

class LogoController extends Controller
{
    protected $caiDat;

    public function __construct(CaiDatRepository $caiDat)
    {
        $this->caiDat = $caiDat;
    }

    public function index(Request $request)
    {
        $caiDat = $this->caiDat->getConfig();

        return view('admin.logo.index', compact('caiDat'));
    }

    public function store(Request $request)
    {
        // Validate
        $data = $request->all();

        $file = $data['logo'];
        $extension = strtolower($file->getClientOriginalExtension());
        if ($extension === 'png') {
            // Xoá file cũ
            unlink('images/logo/logo.png');

            // Up file mới
            $link = 'images/logo/';
            $file->move($link, 'logo.png');
        }

        return redirect()->back();
    }
}
