<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_assigns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id')->unsigned();
            $table->bigInteger('teacher_id')->unsigned();
            $table->bigInteger('depertment_id')->unsigned();
            $table->timestamps();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('depertment_id')->references('id')->on('depertments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_assigns');
    }
}
