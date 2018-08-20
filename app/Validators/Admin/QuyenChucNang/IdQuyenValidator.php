<?php

namespace App\Validators\Admin\QuyenChucNang;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class IdQuyenValidator extends LaravelValidator
{
    protected $rules = [
        'id_quyen' => 'required|exists:nhom_quyen,id',
    ];
}
