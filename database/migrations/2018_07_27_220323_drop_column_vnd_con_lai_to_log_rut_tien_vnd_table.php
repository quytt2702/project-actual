<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnVndConLaiToLogRutTienVndTable extends Migration
{
    public function up()
    {
        Schema::table('log_rut_tien_vnd', function (Blueprint $table) {
            $table->dropColumn('vnd_con_lai');
        });
    }

    public function down()
    {
        Schema::table('log_rut_tien_vnd', function (Blueprint $table) {
            //
        });
    }
}
