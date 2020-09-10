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
            $table->id('score_id')->primary();
            $table->integer('student_class_id')->unsigned();
            $table->integer('course_grade_id')->unsigned();
            $table->timestamps();
            $table->foreign('student_class_id')->references('student_class_id')->on('Student_Class')->onDelete('cascade');
            $table->foreign('course_grade_id')->references('course_grade_id')->on('Course_Grade')->onDelete('cascade');
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
