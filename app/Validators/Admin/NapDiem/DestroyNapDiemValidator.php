<?php

namespace App\Validators\Admin\NapDiem;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class DestroyNapDiemValidator extends LaravelValidator
{
    protected $rules = [
        'id' => 'required|exists:code_nap_diem,id',
    ];
}
