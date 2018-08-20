<?php

use Illuminate\Database\Seeder;

class CaiDatChungSeeder extends Seeder
{

    public function run()
    {
        DB::table('cai_dat_chung')->insert([
            'email'                             => 'skyfoodresponse@gmail.com',
            'email_password'                    => 'nacszhqgtjdrxmoi',
            'thuong_gioi_thieu_dang_ky'         => 12000,
            'so_lan_nap_sai_lien_tuc'           => 3,
            'logo'                              => '/images/logo/logo.png',
            'phan_tram_thuong_doanh_thu_cap_1'  => 15,
            'phan_tram_thuong_doanh_thu_cap_2'  => 5,
            'phi_ship_ctv'                      => 10000,
            'phi_ship_cod'                      => 10000,
            'phi_ship_ngan_luong'               => 10000,
        ]);
    }
}
