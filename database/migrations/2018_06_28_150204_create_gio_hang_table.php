<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGioHangTable extends Migration
{
    public function up()
    {
        Schema::create('gio_hang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gio_hang_email');
            $table->text('gio_hang_noi_dung');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gio_hang');
    }
}
