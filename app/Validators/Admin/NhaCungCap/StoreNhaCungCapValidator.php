<?php

namespace App\Validators\Admin\NhaCungCap;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class StoreNhaCungCapValidator extends LaravelValidator
{
    protected $rules = [
        'nha_cung_cap_ten'              => 'required',
        'nha_cung_cap_dia_chi'          => 'required',
        'nha_cung_cap_phone_01'         => 'required|numeric',
        'nha_cung_cap_phone_02'         => 'numeric',
        'nha_cung_cap_is_active'        => 'required',
        'hinh_anh'                      => 'required',
    ];
}
