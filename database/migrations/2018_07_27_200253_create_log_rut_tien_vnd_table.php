<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogRutTienVndTable extends Migration
{
    public function up()
    {
        Schema::create('log_rut_tien_vnd', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email_rut_tien')->nullable();
            $table->double('so_tien')->nullable();
            $table->double('vnd_con_lai')->nullable();
            $table->string('tinh_trang')->nullable();
            $table->string('ngan_hang')->nullable();
            $table->text('thong_bao')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('log_rut_tien_vnd');
    }
}
