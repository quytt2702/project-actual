<?php

namespace App\Validators\Admin\HoaDonNhapHang;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class StoreHoaDonNhapHangValidator extends LaravelValidator
{
    protected $rules = [
        '*'                 => 'required|array|min:1',
        '*.id_san_pham'     => 'required|exists:san_pham,id',
        '*.so_luong'        => 'required|numeric',
        '*.don_gia'         => 'required|numeric',
        '*.id_nha_cung_cap' => 'required|exists:nha_cung_cap,id',
    ];
}
