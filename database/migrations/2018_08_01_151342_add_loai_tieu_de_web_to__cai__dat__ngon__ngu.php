<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Entities\Admin\CaiDatNgonNgu;

class AddLoaiTieuDeWebToCaiDatNgonNgu extends Migration
{
    public function up()
    {
        Schema::table('cai_dat_ngon_ngu', function (Blueprint $table) {
            $table->string('loai_tieu_de_web')->default(CaiDatNgonNgu::LOAI_TIEU_DE_WEB['CHU']);
        });
    }

    public function down()
    {
        Schema::table('cai_dat_ngon_ngu', function (Blueprint $table) {
            //
        });
    }
}
