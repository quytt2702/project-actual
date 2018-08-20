<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaiDatChungTable extends Migration
{
    public function up()
    {
        Schema::create('cai_dat_chung', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->nullable();
            $table->string('email_password')->nullable();
            $table->double('thuong_gioi_thieu_dang_ky')->nullable();
            $table->integer('so_lan_nap_sai_lien_tuc')->nullable();
            $table->double('phan_tram_thuong_doanh_thu_cap_1')->nullable();
            $table->double('phan_tram_thuong_doanh_thu_cap_2')->nullable();
            $table->double('phi_ship_ctv')->nullable();
            $table->double('phi_ship_cod')->nullable();
            $table->double('phi_ship_ngan_luong')->nullable();
            $table->double('don_hang_dau')->nullable();
            $table->double('don_hang_sau')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cai_dat_chung');
    }
}
