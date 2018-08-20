<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLichSuSanPhamTable extends Migration
{

    public function up()
    {
        Schema::create('lich_su_san_pham', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_san_pham')->index()->nullable();
            $table->string('ten')->nullable();
            $table->string('mo_ta')->nullable();
            $table->string('hinh_anh_1')->nullable();
            $table->string('hinh_anh_2')->nullable();
            $table->string('url')->nullable();
            $table->text('noi_dung_tab_1')->nullable();
            $table->text('noi_dung_tab_2')->nullable();
            $table->text('noi_dung_tab_3')->nullable();
            $table->text('noi_dung_tab_4')->nullable();
            $table->text('noi_dung_tab_5')->nullable();
            $table->double('don_gia_ban')->nullable();
            $table->double('don_gia_khuyen_mai')->nullable();
            $table->string('co_khuyen_mai')->nullable();
            $table->string('hang_tang_kem')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lich_su_san_pham');
    }
}
