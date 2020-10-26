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
            $table->increments('t_id');
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
