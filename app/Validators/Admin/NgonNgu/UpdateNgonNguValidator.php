<?php

namespace App\Validators\Admin\NgonNgu;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UpdateNgonNguValidator extends LaravelValidator
{
    protected $rules = [
        'id' => 'required|exists:ngon_ngu,id'
    ];
}
