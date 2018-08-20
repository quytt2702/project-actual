<?php

namespace App\Validators\CongTacVien\XacThuc;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class StoreCongTacVienValidator extends LaravelValidator
{
    protected $rules = [
        'cmnd'                  => 'required|numeric',
        'ngay_sinh'             => 'required',
        'gioi_tinh'             => 'required|in:NAM,NỮ',
        'dia_chi_hien_tai'      => 'required',
        'dia_chi_cmnd'          => 'required',
        'img_01'                => 'required|image|max:10240',
        'img_02'                => 'required|image|max:10240',
        'img_avatar'            => 'required|image|max:10240',
        'tinh_thanh'            => 'required|exists:tinh_thanh,ten_tinh_thanh',
        'so_dien_thoai'         => 'required|numeric',
    ];
}
