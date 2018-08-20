<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChuyenMucTable extends Migration
{
    public function up()
    {
        Schema::create('chuyen_muc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_chuyen_muc')->nullable();
            $table->string('url')->nullable();
            $table->string('is_active')->nullable();
            $table->unsignedInteger('id_ngon_ngu')->index()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chuyen_muc');
    }
}
