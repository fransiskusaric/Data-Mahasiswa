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
            $table->increments('student_grade_id');
            $table->string('student_id', 5);
            $table->integer('grade_id')->unsigned();
            $table->date('enroll_date');
            $table->date('grad_date')->nullable();
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
        Schema::dropIfExists('Student_Grade');
    }
}
