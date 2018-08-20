<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Entities\TmdtPage;

class CreateTmdtPageTable extends Migration
{
    public function up()
    {
        Schema::create('tmdt_page', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->nullable();
            $table->string('email_nguoi_tao')->nullable();
            $table->string('email_nguoi_edit')->nullable();
            $table->text('sections')->nullable();
            $table->string('ten_trang')->nullable();
            $table->text('tags')->nullable();
            $table->text('keywords')->nullable();
            $table->string('is_trang_chu')->default(TmdtPage::IS_TRANG_CHU['NO'])->nullable();
            $table->string('is_view')->default(TmdtPage::IS_VIEW['YES'])->nullable();
            $table->string('is_delete')->default(TmdtPage::IS_DELETE['NO'])->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tmdt_page');
    }
}
