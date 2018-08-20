<?php

namespace App\Validators\Admin\PhanTramThuongDaiLy;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class DestroyPhanTramThuongDaiLyValidator extends LaravelValidator
{
    protected $rules = [
        'id' => 'required|exists:phan_tram_thuong_dai_ly,id'
    ];
}
