<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StudentGrade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Student_Grade', function (Blueprint $table) {
            $table->id('student_grade_id')->primary();
            $table->string('student_id', 5)->unsigned();
            $table->integer('grade_id')->unsigned();
            $table->date('enroll_date');
            $table->date('grad_date')->nullable();
            $table->timestamps();
            $table->foreign('student_id')->references('student_id')->on('M_Students')->onDelete('cascade');
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
        Schema::dropIfExists('Student_Grade');
    }
}
