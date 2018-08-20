<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaiDatNgonNguTable extends Migration
{
    public function up()
    {
        Schema::create('cai_dat_ngon_ngu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tieu_de_trang_web')->nullable();
            $table->string('hotline')->nullable();
            $table->text('chat_js')->nullable();
            $table->string('sdt')->nullable();
            $table->string('facebook')->nullable();
            $table->string('google_plus')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('vimeo')->nullable();
            $table->string('weibo')->nullable();
            $table->string('twitter')->nullable();
            $table->string('don_vi_tinh')->nullable();
            $table->string('don_vi_hien_thi')->nullable();
            $table->double('don_hang_dau')->nullable();
            $table->double('don_hang_sau')->nullable();
            $table->double('ti_gia_milk')->nullable();
            $table->string('ten_menu_doc')->nullable();
            $table->string('tieu_de_menu_doc')->nullable();
            $table->text('menu_doc')->nullable();
            $table->text('menu_ngang')->nullable();
            $table->string('tieu_de_footer')->nullable();
            $table->string('link_tieu_de_footer')->nullable();
            $table->string('sdt_footer')->nullable();
            $table->string('dia_chi_footer')->nullable();
            $table->string('tieu_de_menu_01_footer')->nullable();
            $table->text('noi_dung_menu_01_body')->nullable();
            $table->string('tieu_de_menu_02_footer')->nullable();
            $table->text('noi_dung_menu_02_body')->nullable();
            $table->string('tieu_de_menu_03_footer')->nullable();
            $table->text('noi_dung_menu_03_body')->nullable();
            $table->text('mo_ta_ngan_footer')->nullable();
            $table->string('link_trang_chu')->nullable();
            $table->unsignedInteger('id_ngon_ngu')->index()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cai_dat_ngon_ngu');
    }
}
