<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReserveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserve', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')
            ->comment('老師')
            ->nullable()
            ->references('id')
            ->on('users')
            ->onDelete('set null');
            $table->foreignId('student_id')
            ->comment('學生')
            ->nullable()
            ->references('id')
            ->on('students')
            ->onDelete('set null');
            $table->year('year')->comment('年');
            $table->tinyInteger('month')->comment('月份');
            $table->tinyInteger('week')->comment('星期');
            $table->tinyInteger('day')->comment('日期');
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
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
        Schema::dropIfExists('reserve');
    }
}
