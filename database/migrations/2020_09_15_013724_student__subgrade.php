<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StudentSubgrade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Student_Subgrade', function (Blueprint $table) {
            $table->id('student_subgrade_id')->primary();
            $table->integer('student_grade_id')->unsigned();
            $table->integer('subgrade_id')->unsigned();
            $table->timestamps();
            $table->foreign('student_grade_id')->references('student_grade_id')->on('Student_Grade')->onDelete('cascade');
            $table->foreign('subgrade_id')->references('subgrade_id')->on('M_Subgrades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Student_Subgrade');
    }
}
