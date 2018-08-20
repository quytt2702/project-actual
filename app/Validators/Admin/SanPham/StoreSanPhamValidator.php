<?php

namespace App\Validators\Admin\SanPham;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class StoreSanPhamValidator extends LaravelValidator
{
    protected $rules = [
        'san_pham_ma'                   => 'required|unique:san_pham,san_pham_ma',
        'san_pham_ten'                  => 'required|unique:san_pham,san_pham_ten',
        'san_pham_url'                  => 'required|unique:url,url_url',
        'san_pham_mo_ta'                => 'required',
        'san_pham_keyword'              => 'required',
        'san_pham_tags'                 => 'required',
        'san_pham_gia_ban_thuc_te'      => 'required|numeric|min:0',
        'san_pham_gia_ban_khuyen_mai'   => 'nullable|numeric|min:0',
        'san_pham_hinh_dai_dien'        => 'required',
    ];
}
