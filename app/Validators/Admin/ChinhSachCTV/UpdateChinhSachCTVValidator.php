<?php

namespace App\Validators\Admin\ChinhSachCTV;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UpdateChinhSachCTVValidator extends LaravelValidator
{
    protected $rules = [
        'thuong_gioi_thieu_dang_ky'         => 'nullable|numeric|min:0',
        'phan_tram_thuong_doanh_thu_cap_1'  => 'nullable|numeric|min:0|max:100',
        'phan_tram_thuong_doanh_thu_cap_2'  => 'nullable|numeric|min:0|max:100',
    ];
}
