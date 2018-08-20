<?php

namespace App\Validators\Admin\NganHang;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class NganHangIdValidator extends LaravelValidator
{
    protected $rules = [
        'id' => 'required|exists:ngan_hang,id'
    ];
}
