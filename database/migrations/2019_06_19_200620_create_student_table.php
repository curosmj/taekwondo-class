<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dob');
            $table->unsignedInteger('person_id')->nullable();
            $table->unsignedInteger('mother_id')->nullable();
            $table->unsignedInteger('father_id')->nullable();
            $table->foreign('person_id')->references('id')->on('person');
            $table->foreign('mother_id')->references('id')->on('person');
            $table->foreign('father_id')->references('id')->on('person');
            $table->string('status');
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
        Schema::dropIfExists('student');
    }
}