<?php

namespace App\Validators\Admin\Admin;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class DestroyAdminValidator extends LaravelValidator
{
    protected $rules = [
        'id' => 'required|exists:admin,id',
    ];
}
