<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropSdtToCongTacVienTable extends Migration
{
    public function up()
    {
        Schema::table('cong_tac_vien', function (Blueprint $table) {
            $table->dropColumn('sdt');
        });
    }

    public function down()
    {
        Schema::table('cong_tac_vien', function (Blueprint $table) {
            //
        });
    }
}
