<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogThuongDonHangTable extends Migration
{
    public function up()
    {
        Schema::create('log_thuong_don_hang', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_nguoi_duoc_thuong')->index()->nullable();
            $table->string('ten_nguoi_duoc_thuong')->nullable();
            $table->unsignedInteger('id_don_hang')->index()->nullable();
            $table->double('so_tien_mua_don_hang')->nullable();
            $table->double('phan_tram_duoc_thuong')->nullable();
            $table->string('ten_khach_hang_mua')->nullable();
            $table->string('sdt_khach_hang_mua')->nullable();
            $table->string('email_khach_hang_mua')->nullable();
            $table->double('so_tien_duoc_thuong')->nullable();
            $table->integer('cap_thuong')->nullable();
            $table->string('hash')->nullable();
            $table->text('ghi_chu')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('log_thuong_don_hang');
    }
}
