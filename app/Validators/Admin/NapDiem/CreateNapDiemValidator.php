<?php

namespace App\Validators\Admin\NapDiem;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class CreateNapDiemValidator extends LaravelValidator
{
    protected $rules = [
        'so_luong_code' => 'required|numeric|min:0|max:200',
        'so_diem'       => 'required',
        'is_active'     => 'required|in:YES,NO',
    ];
}
