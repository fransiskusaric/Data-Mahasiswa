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
            $table->int('student_id')->primary->unique;
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->date('birth_date');
            $table->string('phone', 12);
            $table->int('grade_id');
            $table->int('major_id');
            $table->string('classroom', 5);
            $table->date('enroll_year');
            $table->date('grad_year')->nullable();
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
