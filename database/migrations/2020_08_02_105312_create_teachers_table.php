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
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('teacher_id')->primary;
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->date('birth_date');
            $table->string('phone', 12);
            $table->integer('course_id');
            $table->integer('grade_id');
            $table->date('in_date');
            $table->date('out_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
