<?php

namespace App\Validators\Admin\ChuyenMucSanPham;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class StoreChuyenMucSanPhamValidator extends LaravelValidator
{
    protected $rules = [
        'chuyen_muc_san_pham_ten'           => 'required|unique:chuyen_muc_san_pham,chuyen_muc_san_pham_ten',
        'chuyen_muc_san_pham_url'           => 'required|regex:/[a-zA-Z0-9\-]+/|unique:url,url_url',
        'chuyen_muc_san_pham_id_ngon_ngu'   => 'required',
        'chuyen_muc_san_pham_is_active'     => 'required',
    ];
}
