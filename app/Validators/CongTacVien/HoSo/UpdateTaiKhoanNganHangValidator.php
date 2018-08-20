<?php

namespace App\Validators\CongTacVien\HoSo;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UpdateTaiKhoanNganHangValidator extends LaravelValidator
{
    protected $rules = [
        'so_tai_khoan'      => 'required',
        'ten_chi_nhanh'     => 'required',
        'ten_chu_tai_khoan' => 'required',
    ];
}
