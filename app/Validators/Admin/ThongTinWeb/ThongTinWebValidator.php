<?php

namespace App\Validators\Admin\ThongTinWeb;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ThongTinWebValidator extends LaravelValidator
{
    protected $rules = [
        'url_noi_dung' => 'required',
    ];
}
