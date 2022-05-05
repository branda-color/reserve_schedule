<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username',256)->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mob',24)->nullable();
            $table->binary('password', 32)->comment('密碼');
            $table->string('service_id',256)->nullable()->comment('第三方UID');
            $table->enum('status', ['N', 'Y', 'D', 'M'])->default('Y')->comment('上架狀況');
            $table->tinyInteger('class_No')->default(0)->comment('課堂數');
            $table->rememberToken();
            $table->string('timezone',256)->comment('時區');
            $table->timestampsTz();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
