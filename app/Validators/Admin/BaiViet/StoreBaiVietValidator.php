<?php

namespace App\Validators\Admin\BaiViet;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class StoreBaiVietValidator extends LaravelValidator
{
    protected $rules = [
        'tieu_de'          => 'required',
        'url'              => 'required|regex:/^[a-zA-Z0-9\-]+$/|unique:url,url_url',
        'mo_ta_ngan'       => 'required',
        'noi_dung'         => 'required',
        'keyword'          => 'required',
        'ten_chuyen_muc'   => 'required',
        'hinh_dai_dien'    => 'required',
        'id_chuyen_muc.*'  => 'numeric|required',
    ];
}
