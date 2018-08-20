<?php

namespace App\Validators\Admin\QuyenChucNang;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class IdQuyenIdChucNangValidator extends LaravelValidator
{
    protected $rules = [
        'id_quyen'      => 'required|exists:nhom_quyen,id',
        'id_chuc_nang'  => 'required|exists:chuc_nang,id',
    ];
}
