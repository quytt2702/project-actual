<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTinhThanhTable extends Migration
{
    public function up()
    {
        Schema::create('tinh_thanh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_tinh_thanh');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tinh_thanh');
    }
}
