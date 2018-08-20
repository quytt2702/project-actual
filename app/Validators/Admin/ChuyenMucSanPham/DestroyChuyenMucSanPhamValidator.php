<?php

namespace App\Validators\Admin\ChuyenMucSanPham;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class DestroyChuyenMucSanPhamValidator extends LaravelValidator
{
    protected $rules = [
        'id' => 'required|exists:chuyen_muc_san_pham,id',
    ];
}
