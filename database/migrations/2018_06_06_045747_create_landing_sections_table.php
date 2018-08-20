<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('landing_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('theme_id')->index();
            $table->string('hash')->nullable();
            $table->text('menu_title')->nullable();
            $table->string('section_type')->nullable();
            $table->integer('position')->default(1);
            $table->string('code');
            $table->text('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->text('content_left')->nullable();
            $table->text('content_right')->nullable();
            $table->string('image_url')->nullable();
            $table->string('video_url')->nullable();
            $table->string('guest_full_name')->nullable();
            $table->string('guest_message')->nullable();
            $table->string('guest_email')->nullable()->index();
            $table->text('background_image')->nullable();
            $table->string('background_color')->nullable();
            $table->string('countdown_type')->default('end_time');
            $table->string('countdown_time')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('landing_sections');
    }
}
