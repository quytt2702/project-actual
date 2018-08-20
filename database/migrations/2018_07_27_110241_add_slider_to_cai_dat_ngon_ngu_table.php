<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Entities\Admin\CaiDatNgonNgu;

class AddSliderToCaiDatNgonNguTable extends Migration
{
    public function up()
    {
        Schema::table('cai_dat_ngon_ngu', function (Blueprint $table) {
            $table->string('is_slider')->default(CaiDatNgonNgu::IS_SLIDER['NO'])->nullable();
            $table->text('noi_dung_slider')->nullable();
        });
    }

    public function down()
    {
        Schema::table('cai_dat_ngon_ngu', function (Blueprint $table) {
        });
    }
}
