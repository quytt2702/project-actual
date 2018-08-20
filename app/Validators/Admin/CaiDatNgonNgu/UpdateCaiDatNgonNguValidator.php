<?php

namespace App\Validators\Admin\CaiDatNgonNgu;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UpdateCaiDatNgonNguValidator extends LaravelValidator
{
    protected $rules = [
        'id_ngon_ngu'       => 'required|exists:cai_dat_ngon_ngu,id_ngon_ngu',
        'don_hang_dau'      => 'nullable|numeric|min:0',
        'don_hang_sau'      => 'nullable|numeric|min:0',
        'thuong_gioi_thieu' => 'nullable|numeric|min:0',
        'ti_gia_milk'       => 'nullable|numeric|min:0',
        'tieu_de_trang_web' => 'nullable|max:255',
        'email'             => 'nullable|email',
    ];
}
