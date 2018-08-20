<?php

namespace App\Validators\Admin\ChuyenMuc;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class DestroyChuyenMucValidator extends LaravelValidator
{
    protected $rules = [
        'id' => 'required|exists:chuyen_muc,id',
    ];
}
