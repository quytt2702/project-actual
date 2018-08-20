<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Illuminate\Foundation\Auth\User as Authenticatable;

class CongTacVien extends Authenticatable implements Transformable
{
    use TransformableTrait;

    protected $table = 'cong_tac_vien';

    protected $fillable = [
        'email', 'password', 'cmnd', 'so_dien_thoai',
        'so_tai_khoan', 'dia_chi_cmnd', 'tinh_thanh',
        'dia_chi_hien_tai', 'ten_chu_tai_khoan',
        'avatar', 'ho_va_ten',
        'ngay_sinh', 'gioi_tinh', 'admin_kich_hoat',
        'email_gioi_thieu', 'txid', 'txid_quen_mat_khau',
        'trang_thai_quen_mat_khau', 'ngay_quen_mat_khau',
        'id_nguoi_dung', 'ip_dang_ky', 'facebook',
        'ten_chi_nhanh', 'is_delete', 'is_kich_hoat',
        'id_ngan_hang', 'li_do_khong_duyet', 'convert_email',
        'so_thanh_vien_da_gioi_thieu', 'is_dai_ly', 'email_dai_ly_quan_ly'
    ];

    const TRANG_THAI_QUEN_MAT_KHAU = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];

    const IS_KICH_HOAT = [
        'NOT_YET'   => 'NOT YET',
        'PENDING'   => 'PENDING',
        'NOT_ALLOW' => 'NOT ALLOW',
        'DONE'      => 'DONE',
    ];

    const IS_DELETE = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];

    const IS_BLOCK = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];

    const GIOI_TINH = [
        'NAM' => 'NAM',
        'NU'  => 'NỮ',
    ];

    const IS_DAI_LY = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];

    const ADMIN_KICH_HOAT = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];

    public function getAvatarAttribute($value)
    {
        if (empty($value)) {
            return '/images/users/default-user.png';
        }

        return $value;
    }
}
