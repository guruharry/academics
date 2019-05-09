<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('course',50);
            $table->string('semester',10);
            $table->string('unit',50);
            $table->string('exam',50);
            $table->string('marks',10);

            $table->foreign('course')->references('name')->on('courses');
            $table->foreign('semester')->references('name')->on('semesters');
            $table->foreign('unit')->references('name')->on('units');
            $table->foreign('exam')->references('name')->on('exams');
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
        Schema::dropIfExists('marks');
    }
}
