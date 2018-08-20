<?php

namespace App\Validators\NguoiDung\GioHang;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ThanhToanGioHangValidator extends LaravelValidator
{
    protected $rules = [
        'email'                  => 'required|email',
        'ho_ten'                 => 'required',
        'sdt'                    => 'required',
        'phuong'                 => 'required',
        'duong'                  => 'required',
        'quan_huyen'             => 'required',
        'thanh_pho'              => 'required',
        'phuong_thuc_thanh_toan' => 'required|in:COD,ONLINE'
    ];
}
