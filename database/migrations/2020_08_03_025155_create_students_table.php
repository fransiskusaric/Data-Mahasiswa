<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('s_id')->primary;
            $table->string('name');
            $table->char('student_id', 5)->unique;
            $table->string('address');
            $table->string('city');
            $table->date('birth_date');
            $table->string('phone', 12);
            $table->integer('grade_id');
            $table->integer('major_id')->nullable();
            $table->string('classroom', 5);
            $table->date('enroll_year');
            $table->date('grad_year')->nullable();
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
        Schema::dropIfExists('students');
    }
}
