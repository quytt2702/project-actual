<?php

namespace App\Validators\CongTacVien\NapDiem;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class StoreNapDiemValidator extends LaravelValidator
{
    protected $rules = [
        'ma_nap_diem' => 'required',
        'seri' => 'required',
    ];
}
