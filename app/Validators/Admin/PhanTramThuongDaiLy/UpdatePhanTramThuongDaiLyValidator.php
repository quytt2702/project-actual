<?php

namespace App\Validators\Admin\PhanTramThuongDaiLy;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UpdatePhanTramThuongDaiLyValidator extends LaravelValidator
{
    protected $rules = [
        'id'                => 'required|exists:phan_tram_thuong_dai_ly,id',
        'muc_yeu_cau_duoi'  => 'required',
        'muc_yeu_cau_tren'  => 'required',
        'phan_tram_thuong'  => 'required|numeric|min:0|max:100',
    ];
}
