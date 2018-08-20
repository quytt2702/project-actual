<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkWebToNgonNguTable extends Migration
{
    public function up()
    {
        Schema::table('ngon_ngu', function (Blueprint $table) {
            $table->string('link_web')->nullable();
        });
    }

    public function down()
    {
        Schema::table('ngon_ngu', function (Blueprint $table) {
            //
        });
    }
}
