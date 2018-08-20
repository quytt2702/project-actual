<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Entities\Admin\Admin;

class CreateAdminTable extends Migration
{
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('email')->nullable();
            $table->string('ho_va_ten')->nullable();
            $table->string('is_delete')->default(Admin::IS_DELETE['NO'])->nullable();
            $table->string('is_block')->default(Admin::IS_BLOCK['NO'])->nullable();
            $table->unsignedInteger('id_nhom_quyen')->index()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
