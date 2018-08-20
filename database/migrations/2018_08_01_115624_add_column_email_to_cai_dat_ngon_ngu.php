<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnEmailToCaiDatNgonNgu extends Migration
{
    public function up()
    {
        Schema::table('cai_dat_ngon_ngu', function (Blueprint $table) {
            $table->string('email')->nullable();
        });
    }

    public function down()
    {
        Schema::table('cai_dat_ngon_ngu', function (Blueprint $table) {
            //
        });
    }
}
