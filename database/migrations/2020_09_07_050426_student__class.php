<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StudentClass extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Student_Class', function (Blueprint $table) {
            $table->id('student_class_id')->primary();
            $table->integer('student_grade_id')->unsigned();
            $table->string('class_id', 5);
            $table->timestamps();
            $table->foreign('student_grade_id')->references('student_grade_id')->on('Student_Grade')->onDelete('cascade');
            $table->foreign('class_id')->references('class_id')->on('Classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Student_Class');
    }
}
