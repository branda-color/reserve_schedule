<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')
            ->comment('老師')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->string('citizenship',256)->comment('國籍');
            $table->enum('sex',['F','M'])->comment('性別')->nullable();
            $table->string('photo',128)->nullable()->comment('相片');
            $table->mediumText('intro')->nullable()->comment('介紹');
            $table->string('skill',256)->nullable()->comment('專長');
            $table->enum('status', ['N', 'Y', 'D', 'M'])->default('Y')->comment('上架狀況');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_profile');
    }
}
