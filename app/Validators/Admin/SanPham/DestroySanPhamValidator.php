<?php

namespace App\Validators\Admin\SanPham;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class DestroySanPhamValidator extends LaravelValidator
{
    protected $rules = [
        'id' => 'required|exists:san_pham,id',
    ];
}
