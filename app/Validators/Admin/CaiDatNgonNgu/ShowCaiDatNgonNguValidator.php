<?php

namespace App\Validators\Admin\CaiDatNgonNgu;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ShowCaiDatNgonNguValidator extends LaravelValidator
{
    protected $rules = [
        'id_ngon_ngu' => 'required|exists:cai_dat_ngon_ngu,id_ngon_ngu'
    ];
}
