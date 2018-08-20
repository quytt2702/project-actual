<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogThuongGioiThieuTable extends Migration
{
    public function up()
    {
        Schema::create('log_thuong_gioi_thieu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_nguoi_duoc_thuong')->nullable();
            $table->unsignedInteger('id_nguoi_lien_quan')->index()->nullable();
            $table->string('ten_nguoi_lien_quan')->nullable();
            $table->double('so_tien')->nullable();
            $table->string('li_do')->nullable();
            $table->string('hash')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('log_thuong_gioi_thieu');
    }
}
