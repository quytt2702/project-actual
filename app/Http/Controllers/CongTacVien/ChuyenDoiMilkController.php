<?php

namespace App\Http\Controllers\CongTacVien;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\TienNguoiDungRepository;

class ChuyenDoiMilkController extends Controller
{
    protected $tienNguoiDung;

    public function __construct(TienNguoiDungRepository $tienNguoiDung)
    {
        $this->tienNguoiDung = $tienNguoiDung;
    }

    public function index(Request $request)
    {
        $user = Auth::guard('cong_tac_vien')->user();
        $tienNguoiDung = $this->tienNguoiDung->findByEmail($user->email);

        return view('cong_tac_vien.chuyen_doi_milk.index', compact('tienNguoiDung'));
    }

    public function partial(Request $request)
    {
        return view();
    }
}
