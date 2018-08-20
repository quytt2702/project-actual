<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldGhiChuToTmdtSection extends Migration
{
    public function up()
    {
        Schema::table('tmdt_section', function (Blueprint $table) {
            $table->text('ghi_chu')->nullable();
        });
    }

    public function down()
    {
        Schema::table('tmdt_section', function (Blueprint $table) {
            //
        });
    }
}
