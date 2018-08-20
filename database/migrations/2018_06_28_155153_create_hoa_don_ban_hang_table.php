<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoaDonBanHangTable extends Migration
{
    public function up()
    {
        Schema::create('hoa_don_ban_hang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loai_thanh_toan')->nullable();
            $table->string('email_cong_tac_vien')->nullable();
            $table->string('email_khach_hang_mua')->nullable();
            $table->string('email_cap_nhat')->nullable();
            $table->text('dia_chi_nhan_hang')->nullable();
            $table->double('so_tien_mua')->nullable();
            $table->double('so_milk_mua')->nullable();
            $table->double('fee_ship')->nullable();
            $table->string('ma_van_don')->nullable();
            $table->string('tracking_link')->nullable();
            $table->text('ghi_chu')->nullable();
            $table->string('loai_van_don')->nullable();
            $table->string('trang_thai')->nullable();
            $table->string('hash')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hoa_don_ban_hang');
    }
}
