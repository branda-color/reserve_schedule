<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('主鍵');
            $table->unsignedTinyInteger('level')->unique()->comment('層級');
            $table->string('name', 16)->unique()->comment('角色名稱');
            $table->timestampsTz();
        });

        DB::statement("ALTER TABLE `roles` comment '角色'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
