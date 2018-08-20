<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogHoaDonNhapHang extends Migration
{
    public function up()
    {
        Schema::create('log_hoa_don_nhap_hang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_san_pham')->nullable();
            $table->string('so_luong_san_pham_nhap')->nullable();
            $table->string('don_gia_nhap_san_pham')->nullable();
            $table->string('id_nha_cung_cap')->nullable();
            $table->string('id_hoa_don_nhap_hang')->index()->nullable();
            $table->string('ngay_thay_doi')->nullable();
            $table->string('email_cap_nhat')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('log_hoa_don_nhap_hang');
    }
}
