<?php

namespace App\Validators\Admin\CongTacVien;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class EmailCongTacVienValidator extends LaravelValidator
{
    protected $rules = [
        'email' => 'required|exists:cong_tac_vien,email',
    ];
}
