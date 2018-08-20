<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Entities\Url;

class AddIsViewCongTacVienToUrlTable extends Migration
{
    public function up()
    {
        Schema::table('url', function (Blueprint $table) {
            $table->string('is_view_cong_tac_vien')->default(Url::IS_VIEW_CONG_TAC_VIEN['NO']);
        });
    }

    public function down()
    {
        Schema::table('url', function (Blueprint $table) {
            //
        });
    }
}
