<?php

namespace App\Validators\CongTacVien\HoSo;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ChangePasswordValidator extends LaravelValidator
{
    protected $rules = [
        'current_password'          => 'required|max:255|min:8',
        'new_password'              => 'required|max:255|confirmed|min:8',
        'new_password_confirmation' => 'required|max:255|different:current_password|min:8',
    ];
}
