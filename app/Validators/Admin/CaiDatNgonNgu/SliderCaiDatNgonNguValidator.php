<?php

namespace App\Validators\Admin\CaiDatNgonNgu;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class SliderCaiDatNgonNguValidator extends LaravelValidator
{
    protected $rules = [
        'ten_hien_thi'  => 'required|max:255',
        'url_slider'    => 'required|regex:/^[a-zA-Z0-9\-]+$/',
        'image'         => 'required',
    ];
}
