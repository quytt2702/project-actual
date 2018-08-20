<?php

namespace App\Validators\Admin\ChuyenMuc;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class StoreChuyenMucValidator extends LaravelValidator
{
    protected $rules = [
        'ten_chuyen_muc'    => 'required',
        'url'               => 'required|regex:/^[a-zA-Z0-9\-]+$/|unique:url,url_url',
        'is_active'         => 'required',
    ];
}
