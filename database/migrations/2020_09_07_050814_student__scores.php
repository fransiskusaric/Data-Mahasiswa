<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StudentScores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Student_Scores', function (Blueprint $table) {
            $table->increments('score_id');
            $table->integer('student_class_id')->unsigned();
            $table->integer('course_grade_id')->unsigned();
            $table->integer('task')->nullable();
            $table->integer('mid_test')->nullable();
            $table->integer('final_test')->nullable();
            $table->integer('score')->nullable();
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
        Schema::dropIfExists('Student_Scores');
    }
}
