<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Entities\SanPham;

class CreateSanPhamTable extends Migration
{
    public function up()
    {
        Schema::create('san_pham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('san_pham_ma')->nullable();
            $table->string('san_pham_ten')->nullable();
            $table->string('san_pham_url')->nullable();
            $table->text('san_pham_mo_ta')->nullable();
            $table->double('san_pham_so_luong')->default(0);
            $table->string('san_pham_hinh_dai_dien')->nullable();
            $table->string('san_pham_hinh_anh_slide')->nullable();
            $table->text('san_pham_noi_dung_tab_1')->nullable();
            $table->text('san_pham_noi_dung_tab_2')->nullable();
            $table->text('san_pham_noi_dung_tab_3')->nullable();
            $table->text('san_pham_noi_dung_tab_4')->nullable();
            $table->text('san_pham_noi_dung_tab_5')->nullable();
            $table->string('san_pham_keyword')->nullable();
            $table->string('san_pham_tags')->nullable();
            $table->text('san_pham_id_chuyen_muc')->nullable();
            $table->double('san_pham_gia_ban_thuc_te')->nullable();
            $table->double('san_pham_gia_ban_ao')->nullable();
            $table->string('san_pham_is_khuyen_mai')->nullable();
            $table->string('san_pham_noi_dung_khuyen_mai')->nullable();
            $table->string('san_pham_is_accept')->default(SanPham::IS_ACCEPT['YES'])->nullable();
            $table->string('san_pham_is_delete')->default(SanPham::IS_DELETE['NO'])->nullable();
            $table->unsignedInteger('san_pham_id_nguoi_duyet')->index()->nullable();
            $table->string('san_pham_nguoi_duyet')->nullable();
            $table->unsignedInteger('san_pham_id_nguoi_tao')->index()->nullable();
            $table->string('san_pham_nguoi_tao')->nullable();
            $table->unsignedInteger('san_pham_id_nguoi_cap_nhat')->index()->nullable();
            $table->unsignedInteger('san_pham_nguoi_cap_nhat')->index()->nullable();
            $table->string('san_pham_id_nhom_san_pham')->nullable();
            $table->unsignedInteger('id_ngon_ngu')->index()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('san_pham');
    }
}
