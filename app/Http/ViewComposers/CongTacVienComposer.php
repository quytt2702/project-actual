<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Entities\CongTacVien;

class CongTacVienComposer
{
    public function compose(View $view)
    {
        $txid = request()->cookie('ctvid');
        $congTacVien = CongTacVien::where('txid', $txid)->first();

        $view->with('congTacVien', $congTacVien);
    }
}
