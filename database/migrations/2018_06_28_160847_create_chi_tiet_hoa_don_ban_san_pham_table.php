<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietHoaDonBanSanPhamTable extends Migration
{
    public function up()
    {
        Schema::create('chi_tiet_hoa_don_ban_san_pham', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_san_pham')->index()->nullable();
            $table->unsignedInteger('id_hoa_don_ban_hang')->index()->nullable();
            $table->double('so_luong')->nullable();
            $table->double('don_gia')->nullable();
            $table->double('tong_tien_milk')->nullable();
            $table->double('tong_tien_vnd')->nullable();
            $table->string('loai_thanh_toan')->nullable();
            $table->string('tinh_trang')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chi_tiet_hoa_don_ban_san_pham');
    }
}
