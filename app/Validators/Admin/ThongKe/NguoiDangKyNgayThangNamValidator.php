<?php

namespace App\Validators\Admin\ThongKe;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class NguoiDangKyNgayThangNamValidator extends LaravelValidator
{
    protected $rules = [
        'dateStart'      => 'required|date',
        'dateEnd'        => 'required|date|after_or_equal:dateStart|before:tomorrow',
    ];

    protected $messages = [
        'dateEnd.before' => 'Trường ngày kết thúc phải là một ngày trước ngày hiện tại.',
    ];
}
