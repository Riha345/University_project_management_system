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
            $table->id();
            $table->string('teacher_name');
            $table->string('teacher_email')->unique();
            $table->string('teacher_code')->unique();
            $table->bigInteger('depertment_id')->unsigned();
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
        Schema::dropIfExists('teachers');
    }
}
