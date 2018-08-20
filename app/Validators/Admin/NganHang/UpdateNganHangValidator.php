<?php

namespace App\Validators\Admin\NganHang;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UpdateNganHangValidator extends LaravelValidator
{
    protected $rules = [
        'id'            => 'required|exists:ngan_hang,id',
        'ten_ngan_hang' => 'required'
    ];
}
