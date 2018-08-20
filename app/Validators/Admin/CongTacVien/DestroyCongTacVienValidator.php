<?php

namespace App\Validators\Admin\CongTacVien;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class DestroyCongTacVienValidator extends LaravelValidator
{
    protected $rules = [
        'txid' => 'required|exists:cong_tac_vien,txid',
    ];
}
