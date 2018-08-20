<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNganHangTable extends Migration
{
    public function up()
    {
        Schema::create('ngan_hang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_ngan_hang')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ngan_hang');
    }
}
