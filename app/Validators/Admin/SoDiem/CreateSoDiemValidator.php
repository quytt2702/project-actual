<?php

namespace App\Validators\Admin\SoDiem;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class CreateSoDiemValidator extends LaravelValidator
{
    protected $rules = [
        'noi_dung' => 'required',
        'so_diem'  => 'required|numeric',
    ];
}
