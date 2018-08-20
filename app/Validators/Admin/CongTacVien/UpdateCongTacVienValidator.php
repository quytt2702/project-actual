<?php

namespace App\Validators\Admin\CongTacVien;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UpdateCongTacVienValidator extends LaravelValidator
{
    protected $rules = [
        'cmnd'              => 'required',
        'so_tai_khoan'      => 'required',
        'ho_va_ten'         => 'required',
        'ngay_sinh'         => 'required',
        'gioi_tinh'         => 'required|in:Nam,Nữ',
        'so_dien_thoai'     => 'required',
        'facebook'          => 'required',
        'dia_chi_hien_tai'  => 'required',
        'dia_chi_cmnd'      => 'required',
        'ten_chu_tai_khoan' => 'required',
        'ten_chi_nhanh'     => 'required',
        'id_ngan_hang'      => 'required|exists:ngan_hang,id',
    ];
}
