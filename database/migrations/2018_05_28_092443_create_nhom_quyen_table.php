<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhomQuyenTable extends Migration
{
    public function up()
    {
        Schema::create('nhom_quyen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_nhom')->nullable();
            $table->text('mo_ta')->nullable();
            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('nhom_quyen');
    }
}
