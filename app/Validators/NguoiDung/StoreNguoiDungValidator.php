<?php

namespace App\Validators\NguoiDung;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class StoreNguoiDungValidator extends LaravelValidator
{
    protected $rules = [
        'email'             => 'required|email|unique:nguoi_dung,email',
        'password'          => 'required',
        'cmnd'              => 'required',
        'so_tai_khoan'      => 'required',
        'ho_va_ten'         => 'required',
        'ngay_sinh'         => 'required',
        'gioi_tinh'         => 'required|in:Nam,Nữ',
        'sdt'               => 'required',
        'facebook'          => 'required',
        'dia_chi_hien_tai'  => 'required',
        'dia_chi_cmnd'      => 'required',
        'ten_chu_tai_khoan' => 'required',
        'ten_chi_nhanh'     => 'required',
    ];
}
