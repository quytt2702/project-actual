<?php

namespace App\Validators\Admin\QuanLyTrang;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class DestroyQuanLyTrangValidator extends LaravelValidator
{
    protected $rules = [
        'id' => 'required|exists:quan_ly_trang,id',
    ];
}
