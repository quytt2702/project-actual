<?php

namespace App\Validators\Admin\Tabs;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class IdTabValidator extends LaravelValidator
{
    protected $rules = [
        'id' => 'required|exists:tabs,id',
    ];
}
