<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateButtonLinks extends Migration
{
    public function up()
    {
        Schema::create('button_links', function (Blueprint $table) {
            $table->increments('id');
            $table->text('url')->nullable();
            $table->text('content')->nullable();
            $table->unsignedInteger('section_id')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('button_links');
    }
}
