<?php

namespace App\Validators\Admin\ChuyenMucSanPham;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UpdateChuyenMucSanPhamValidator extends LaravelValidator
{
    protected $rules = [
        'id'                                => 'required|exists:chuyen_muc_san_pham,id',
        'chuyen_muc_san_pham_ten'           => 'required',
        'chuyen_muc_san_pham_is_active'     => 'required',
        'chuyen_muc_san_pham_id_ngon_ngu'   => 'required',
    ];
}
