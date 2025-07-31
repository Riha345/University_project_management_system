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
            $table->id();
            $table->string('student_name');
            $table->string('student_email')->unique();
            $table->bigInteger('depertment_id')->unsigned();
            $table->integer('batch');
            $table->bigInteger('student_reg_id');
            $table->string('password');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
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
        Schema::dropIfExists('students');
    }
}
