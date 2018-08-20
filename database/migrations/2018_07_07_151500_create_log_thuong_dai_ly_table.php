<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogThuongDaiLyTable extends Migration
{
    public function up()
    {
        Schema::create('log_thuong_dai_ly', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('thang');
            $table->integer('nam');
            $table->string('email_dai_ly');
            $table->string('sdt');
            $table->double('so_tien_thuong');
            $table->string('tinh_trang');
            $table->double('doanh_thu');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('log_thuong_dai_ly');
    }
}
