<?php

namespace App\Validators\Admin\SanPham;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UpdateSanPhamValidator extends LaravelValidator
{
    protected $rules = [
        'san_pham_ma'                   => 'required',
        'san_pham_ten'                  => 'required',
        'san_pham_url'                  => 'required|regex:/[a-zA-Z0-9\-]+/',
        'san_pham_mo_ta'                => 'required',
        'san_pham_keyword'              => 'required',
        'san_pham_tags'                 => 'required',
        'san_pham_gia_ban_thuc_te'      => 'required|numeric|min:0',
        'san_pham_gia_ban_khuyen_mai'   => 'nullable|numeric|min:0',
        'san_pham_hinh_dai_dien'        => 'required',
    ];
}
