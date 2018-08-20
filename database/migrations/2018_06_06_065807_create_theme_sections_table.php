<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemeSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('theme_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->index();
            $table->text('title')->nullable();
            $table->text('content')->nullable();
            $table->text('icon')->nullable();
            $table->text('image_url')->nullable();
            $table->unsignedInteger('theme_id')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('theme_sections');
    }
}
