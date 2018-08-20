<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietHoaDonNhapSanPhamTable extends Migration
{
    public function up()
    {
        Schema::create('chi_tiet_hoa_don_nhap_san_pham', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_hoa_don_nhap_san_pham')->index()->nullable();
            $table->unsignedInteger('id_san_pham')->index()->nullable();
            $table->double('so_luong_san_pham_nhap')->nullable();
            $table->double('don_gia_nhap_san_pham')->nullable();
            $table->unsignedInteger('id_nha_cung_cap')->index()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chi_tiet_hoa_don_nhap_san_pham');
    }
}
