<?php

namespace App\Validators\Admin\NguoiDung;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class DestroyNguoiDungValidator extends LaravelValidator
{
    protected $rules = [
        'txid' => 'required|exists:nguoi_dung,txid',
    ];
}
