<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Entities\CongTacVien;

class CreateCongTacVienTable extends Migration
{
    public function up()
    {
        Schema::create('cong_tac_vien', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('so_dien_thoai')->nullable();
            $table->string('cmnd')->nullable();
            $table->string('so_tai_khoan')->nullable();
            $table->string('ho_va_ten')->nullable();
            $table->string('gioi_tinh')->nullable();
            $table->string('txid')->nullable();
            $table->string('sdt')->nullable();
            $table->string('facebook')->nullable();
            $table->string('ten_chi_nhanh')->nullable();
            $table->string('is_kich_hoat')->default(CongTacVien::IS_KICH_HOAT['NOT_YET']);
            $table->string('is_delete')->default(CongTacVien::IS_DELETE['NO']);
            $table->string('dia_chi_hien_tai')->nullable();
            $table->string('dia_chi_cmnd')->nullable();
            $table->string('ten_chu_tai_khoan')->nullable();
            $table->string('email_gioi_thieu')->nullable();
            $table->dateTime('ngay_sinh')->nullable();
            $table->string('admin_kich_hoat')->nullable();
            $table->string('txid_quen_mat_khau')->nullable();
            $table->string('trang_thai_quen_mat_khau')->nullable();
            $table->string('is_block')->default(CongTacVien::IS_BLOCK['NO']);
            $table->datetime('ngay_quen_mat_khau')->nullable();
            $table->string('is_dai_ly')->default(CongTacVien::IS_DAI_LY['NO'])->nullable();
            $table->string('email_dai_ly_quan_ly')->nullable();
            $table->string('ip_dang_ky')->nullable();
            $table->string('img_01')->nullable();
            $table->string('img_02')->nullable();
            $table->string('avatar')->nullable();
            $table->string('tinh_thanh')->nullable();
            $table->string('li_do_khong_duyet')->nullable();
            $table->string('convert_email')->nullable();
            $table->integer('so_thanh_vien_da_gioi_thieu')->default(0)->nullable();
            $table->unsignedInteger('id_nguoi_dung')->index()->nullable();
            $table->unsignedInteger('id_ngan_hang')->index()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cong_tac_vien');
    }
}
