<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachHangTable extends Migration
{

    public function up()
    {
        Schema::create('khach_hang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->nullable();
            $table->string('sdt')->nullable();
            $table->string('ho_ten')->nullable();
            $table->string('duong')->nullable();
            $table->string('phuong')->nullable();
            $table->string('quan_huyen')->nullable();
            $table->string('thanh_pho')->nullable();
            $table->string('email_ctv')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('khach_hang');
    }
}
