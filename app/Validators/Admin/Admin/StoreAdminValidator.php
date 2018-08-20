<?php

namespace App\Validators\Admin\Admin;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class StoreAdminValidator extends LaravelValidator
{
    protected $rules = [
        'email'                 => 'required|email|unique:admin,email',
        'ho_va_ten'             => 'required',
        'password'              => 'required|min:8|confirmed',
        'password_confirmation' => 'required',
        'id_nhom_quyen'         => 'required|exists:nhom_quyen,id',
    ];
}
