<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlTable extends Migration
{
    public function up()
    {
        Schema::create('url', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url_url');
            $table->string('url_ten_loai');
            $table->string('url_noi_dung')->nullable();
            $table->unsignedInteger('id_ngon_ngu')->index()->default(1)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('url');
    }
}
