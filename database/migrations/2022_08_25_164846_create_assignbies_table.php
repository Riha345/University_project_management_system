<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignbiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignbies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('proposal_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->foreign('proposal_id')->references('id')->on('proposals')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignbies');
    }
}
