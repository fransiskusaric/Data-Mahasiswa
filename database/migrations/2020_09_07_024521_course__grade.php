<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CourseGrade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Course_Grade', function (Blueprint $table) {
            $table->id('course_grade_id')->primary();
            $table->integer('course_id')->unsigned();
            $table->integer('grade_id')->unsigned();
            $table->timestamps();
            $table->foreign('course_id')->references('course_id')->on('M_Courses')->onDelete('cascade');
            $table->foreign('grade_id')->references('grade_id')->on('M_Grades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Course_Grade');
    }
}
