<?php

namespace App\Validators\Admin\ChuyenMuc;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UpdateChuyenMucValidator extends LaravelValidator
{
    protected $rules = [
        'id'                => 'required|exists:chuyen_muc,id',
        'ten_chuyen_muc'    => 'required',
        'url'               => 'required|regex:/^[a-zA-Z0-9\-]+$/',
        'is_active'         => 'required',
    ];
}
