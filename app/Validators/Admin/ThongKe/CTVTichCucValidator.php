<?php

namespace App\Validators\Admin\ThongKe;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class CTVTichCucValidator extends LaravelValidator
{
    protected $rules = [
        'thang' => 'required|numeric',
        'nam'   => 'required|numeric',
    ];
}
