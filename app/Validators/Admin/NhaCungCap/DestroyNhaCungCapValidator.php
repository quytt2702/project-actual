<?php

namespace App\Validators\Admin\NhaCungCap;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class DestroyNhaCungCapValidator extends LaravelValidator
{
    protected $rules = [
        'id' => 'required|exists:nha_cung_cap,id',
    ];
}
