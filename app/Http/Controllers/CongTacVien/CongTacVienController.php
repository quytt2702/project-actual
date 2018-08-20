<?php

namespace App\Http\Controllers\CongTacVien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongTacVienController extends Controller
{
    public function index(Request $request)
    {
        return view('cong_tac_vien.index');
    }
}
