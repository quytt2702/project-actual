<?php

namespace App\Validators\Admin\LichSuBaiViet;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class IdLichSuBaiVietValidator extends LaravelValidator
{
    protected $rules = [
        'id' => 'required|exists:lich_su_bai_viet,id',
    ];
}
