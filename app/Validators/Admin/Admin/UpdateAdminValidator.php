<?php

namespace App\Validators\Admin\Admin;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UpdateAdminValidator extends LaravelValidator
{
    protected $rules = [
        'ho_va_ten' => 'required',
    ];
}
