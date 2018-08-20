<?php

namespace App\Validators\Admin\BaiViet;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class DestroyBaiVietValidator extends LaravelValidator
{
    protected $rules = [
        'id' => 'required|exists:bai_viet,id',
    ];
}
