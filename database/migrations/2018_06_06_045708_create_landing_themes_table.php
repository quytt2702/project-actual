<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingThemesTable extends Migration
{
    public function up()
    {
        Schema::create('landing_themes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('keywords')->nullable();
            $table->text('logo')->nullable();
            $table->string('url')->nullable();
            $table->string('tags')->nullable();
            $table->text('json_ld')->nullable();
            $table->text('content')->nullable();
            $table->string('menu_type')->default('fixed');
            $table->string('code')->nullable();
            $table->string('hotline')->nullable();
            $table->text('script_js')->nullable();
            $table->text('thong_bao')->nullable();
            $table->text('noi_dung_email')->nullable();
            $table->string('ten_nut')->nullable();
            $table->unsignedInteger('san_pham_muon_ban_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('landing_themes');
    }
}
