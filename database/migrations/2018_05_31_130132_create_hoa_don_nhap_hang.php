<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoaDonNhapHang extends Migration
{
    public function up()
    {
        Schema::create('hoa_don_nhap_hang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hoa_don_nhap_hang_ten')->nullable();
            $table->string('hoa_don_nhap_hang_chung_tu')->nullable();
            $table->text('hoa_don_nhap_hang_ghi_chu')->nullable();
            $table->string('hoa_don_nhap_hang_email_nguoi_tao')->nullable();
            $table->string('hoa_don_nhap_hang_email_nguoi_sua')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hoa_don_nhap_hang');
    }
}
