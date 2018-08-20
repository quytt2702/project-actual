<?php

namespace App\Validators\Admin\NhomQuyen;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UpdateNhomQuyenValidator extends LaravelValidator
{
    protected $rules = [
        'ten_nhom'  => 'required',
        'mo_ta'     => 'required',
    ];
}
