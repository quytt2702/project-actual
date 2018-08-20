<?php

namespace App\Validators\Admin\SoDiem;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UpdateSoDiemValidator extends LaravelValidator
{
    protected $rules = [
        'noi_dung' => 'required',
        'so_diem'  => 'numeric|required',
        'id'       => 'required|exists:so_diem,id',
    ];
}
