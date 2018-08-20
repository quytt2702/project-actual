<?php

namespace App\Validators\Admin\QuanLyTrang;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UpdateQuanLyTrangValidator extends LaravelValidator
{
    protected $rules = [
        'ten_trang'                     => 'required',
        'url'                           => 'required|regex:/^[a-zA-Z0-9\-]+$/',
        'tags'                          => 'required',
        'keywords'                      => 'required',
        'data.*.section_id'             => 'required',
        'data.*.section_ten'            => 'required',
        'data.*.section_the_loai'       => 'required',
        'data.*.ten_view'               => 'required',
        'data.*.danh_sach_chuyen_muc'   => 'required|array',
        'data.*.kieu_sap_xep'           => 'required|numeric',
        'data.*.so_luong_post'          => 'required|numeric',
        'data.*.is_html'                => 'required|in:YES,NO',
        'data.*.is_slide'               => 'required|in:YES,NO',
        'data.*.danh_sach_slide'        => 'nullable|array',
    ];
}
