<?php

namespace App\Http\Controllers\CongTacVien;

use Auth;
use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    protected function guard()
    {
        return Auth::guard('cong_tac_vien');
    }
}
