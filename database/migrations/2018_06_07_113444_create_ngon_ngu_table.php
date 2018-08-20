<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNgonNguTable extends Migration
{
    public function up()
    {
        Schema::create('ngon_ngu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma');
            $table->string('ten');
            $table->string('url')->nullable();
            $table->string('is_open');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ngon_ngu');
    }
}
