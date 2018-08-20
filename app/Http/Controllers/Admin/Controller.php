<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function kiemTraQuyen($id_nut)
    {
        $user = Auth::guard('admin')->user();
        if ($user->id_nhom_quyen == 1) {
            return true;
        }

        $row = select_raw('SELECT * FROM chuc_nang
            left join quyen_chuc_nang on chuc_nang.id = quyen_chuc_nang.id_chuc_nang
            where quyen_chuc_nang.id_quyen = ' . $user->id_nhom_quyen . '
            and chuc_nang.chuc_nang_ma_code = "' . $id_nut . '"');

        return empty($row);
    }
}
