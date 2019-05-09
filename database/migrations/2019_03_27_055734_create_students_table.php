<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id')->index()->unsigned();
            $table->string('name');
            $table->string('reg_no',15)->unique();
            $table->string('nationality',50);
            $table->string('dob',10);
            $table->string('gender',10);
            $table->string('county',20);
            $table->string('image');
            $table->string('email',100);
            $table->string('address',500);
            $table->string('phone_no',50);
            $table->string('course',50);

            $table->foreign('course')->references('name')->on('courses');
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
