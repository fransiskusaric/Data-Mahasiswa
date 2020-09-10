<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Teachers', function (Blueprint $table) {
            $table->increments('t_id')->primary();
            $table->string('name');
            $table->char('teacher_id')->unique();
            $table->string('address');
            $table->string('city');
            $table->date('birth_date');
            $table->string('phone', 12)->unique();
            $table->integer('course_id')->unsigned();
            $table->integer('grade_id')->unsigned();
            $table->date('in_date');
            $table->date('out_date')->nullable();
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
        Schema::dropIfExists('Teachers');
    }
}
