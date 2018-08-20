<?php

namespace App\Validators\Admin\NhomQuyen;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class DestroyNhomQuyenValidator extends LaravelValidator
{
    protected $rules = [
        'id' => 'required|exists:nhom_quyen,id'
    ];
}
