<?php

namespace App\Validators\Admin\NganHang;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class StoreNganHangValidator extends LaravelValidator
{
    protected $rules = [
        'ten_ngan_hang' => 'required|unique:ngan_hang,ten_ngan_hang'
    ];

    // protected $messages = [
    //     'ten.required' => 'Yêu cầu nhập tên ngân hàng'
    // ];
}
