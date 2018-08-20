<?php

namespace App\Validators\Admin\Logo;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class StoreLogoValidator extends LaravelValidator
{
    protected $rules = [
        'logo' => 'image|mimes:png',
    ];
}
