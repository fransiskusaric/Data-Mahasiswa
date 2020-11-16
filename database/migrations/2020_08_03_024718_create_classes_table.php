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
            $table->string('classroom_id', 5)->primary();
            $table->integer('grade_id')->unsigned();
            $table->integer('subgrade_id')->unsigned();
            $table->string('classroom');
            $table->integer('major_id')->unsigned()->nullable();
            $table->char('teacher_id', 5);
            $table->integer('qty')->default('0');
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
        Schema::dropIfExists('Classes');
    }
}
