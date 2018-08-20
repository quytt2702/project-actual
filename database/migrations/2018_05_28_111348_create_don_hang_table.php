<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonHangTable extends Migration
{

    public function up()
    {
        Schema::create('don_hang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tinh_trang')->nullable();
            $table->string('ten_khach_hang')->nullable();
            $table->unsignedInteger('nguoi_gioi_thieu')->index()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('don_hang');
    }
}
