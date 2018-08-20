<?php

namespace App\Validators\Admin\NguoiDung;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UpdateNguoiDungValidator extends LaravelValidator
{
    protected $rules = [
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
        'id_nhom_quyen'     => 'required|exists:nhom_quyen,id',
        'id_ngan_hang'      => 'required|exists:ngan_hang,id',
    ];
}
