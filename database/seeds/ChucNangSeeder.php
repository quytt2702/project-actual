<?php

use Illuminate\Database\Seeder;

class ChucNangSeeder extends Seeder
{
    public function run()
    {
        DB::table('chuc_nang')->insert([
            [
                'chuc_nang_ma_code' => 'them_ngan_hang',
                'chuc_nang_ten' => 'Thêm ngân hàng',
                'chuc_nang_id_phu' => '4',
                'chuc_nang_ten_nhom' => 'Ngân hàng',
            ], [
                'chuc_nang_ma_code' => 'sua_ngan_hang',
                'chuc_nang_ten' => 'Sửa ngân hàng',
                'chuc_nang_id_phu' => '4',
                'chuc_nang_ten_nhom' => 'Ngân hàng',
            ],[
                'chuc_nang_ma_code' => 'xoa_ngan_hang',
                'chuc_nang_ten' => 'Xoá ngân hàng',
                'chuc_nang_id_phu' => '4',
                'chuc_nang_ten_nhom' => 'Ngân hàng',
            ],[
                'chuc_nang_ma_code' => 'xem_ngan_hang',
                'chuc_nang_ten' => 'Xem ngân hàng',
                'chuc_nang_id_phu' => '',
                'chuc_nang_ten_nhom' => 'Ngân hàng',
            ],[
                'chuc_nang_ma_code' => 'them_chuyen_muc',
                'chuc_nang_ten' => 'Thêm chuyên mục',
                'chuc_nang_id_phu' => '8',
                'chuc_nang_ten_nhom' => 'Chuyên mục',
            ], [
                'chuc_nang_ma_code' => 'sua_chuyen_muc',
                'chuc_nang_ten' => 'Sửa chuyên mục',
                'chuc_nang_id_phu' => '8',
                'chuc_nang_ten_nhom' => 'Chuyên mục',
            ],[
                'chuc_nang_ma_code' => 'xoa_chuyen_muc',
                'chuc_nang_ten' => 'Xoá chuyên mục',
                'chuc_nang_id_phu' => '8',
                'chuc_nang_ten_nhom' => 'Chuyên mục',
            ],[
                'chuc_nang_ma_code' => 'xem_chuyen_muc',
                'chuc_nang_ten' => 'Xem chuyên mục',
                'chuc_nang_id_phu' => '',
                'chuc_nang_ten_nhom' => 'Chuyên mục',
            ]
        ]);
    }
}
