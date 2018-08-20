<?php

namespace App\Validators\Admin\SoDiem;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class CheckIdValidator extends LaravelValidator
{
    protected $rules = [
        'id' => 'required|exists:so_diem,id'
    ];
}
