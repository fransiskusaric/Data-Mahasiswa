<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Classes', function (Blueprint $table) {
            $table->string('class_id', 5)->primary();
            $table->integer('grade_id')->unsigned();
            $table->integer('subgrade_id')->unsigned();
            $table->string('classroom');
            $table->integer('major_id')->unsigned()->nullable();
            $table->char('teacher_id', 5)->unsigned();
            $table->integer('qty');
            $table->timestamps();
            $table->foreign('grade_id')->references('grade_id')->on('M_Grades')->onDelete('cascade');
            $table->foreign('subgrade_id')->references('subgrade_id')->on('M_Subgrades')->onDelete('cascade');
            $table->foreign('major_id')->references('major_id')->on('M_Majors')->onDelete('cascade');
            $table->foreign('teacher_id')->references('teacher_id')->on('M_Teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Classes');
    }
}
