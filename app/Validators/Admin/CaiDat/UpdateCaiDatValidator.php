<?php

namespace App\Validators\Admin\CaiDat;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UpdateCaiDatValidator extends LaravelValidator
{
    protected $rules = [
        'email'                             => 'required',
        'email_password'                    => 'required',
        'don_hang_dau'                      => 'nullable|numeric|min:0',
        'don_hang_sau'                      => 'nullable|numeric|min:0',
        'so_lan_nap_sai_lien_tuc'           => 'nullable|numeric|min:0',
    ];
}
