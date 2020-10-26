<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StudentCourseScore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Student_Course_Score', function (Blueprint $table) {
            $table->increments('student_course_score_id');
            $table->integer('score_id')->unsigned();
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
        Schema::dropIfExists('Student_Course_Score');
    }
}
