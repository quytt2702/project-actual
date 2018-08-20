<?php

namespace App\Validators\Admin\HoaDonBanHang;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class DestroyHoaDonBanHangValidator extends LaravelValidator
{
    protected $rules = [
        'id' => 'required|exists:hoa_don_ban_hang,id',
    ];
}
