<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentRankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_rank', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rank_id');
            $table->unsignedInteger('student_id');
            $table->date('awarded_date');
            $table->foreign('student_id')->references('id')->on('student');
            $table->foreign('rank_id')->references('id')->on('rank');
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
        Schema::dropIfExists('student_rank');
    }
}
