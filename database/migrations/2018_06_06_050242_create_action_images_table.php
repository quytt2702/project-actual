<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionImagesTable extends Migration
{
    public function up()
    {
        Schema::create('action_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('icon')->nullable();
            $table->text('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->text('content')->nullable();
            $table->text('url')->nullable();
            $table->text('image_url')->nullable();
            $table->unsignedInteger('section_id')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('action_images');
    }
}
