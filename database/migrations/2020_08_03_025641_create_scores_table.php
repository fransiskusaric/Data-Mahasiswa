<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->increments('score_id')->primary;
            $table->integer('student_id');
            $table->integer('course_id');
            $table->integer('semester');
            $table->integer('grade_id');
            $table->integer('task')->nullable();
            $table->integer('mid_test')->nullable();
            $table->integer('final_test')->nullable();
            $table->integer('score')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
