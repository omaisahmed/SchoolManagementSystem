<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classroutines', function (Blueprint $table) {
        
            $table->bigIncrements("id");
            $table->string("class");
            $table->string("section");
            $table->string("subject");
            $table->string("teacher");
            $table->string("classroom");
            $table->string("day");
            $table->string("starting_hour");
            $table->string("ending_hour");
            $table->string("starting_minute");
            $table->string("ending_minute");
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
        Schema::dropIfExists('classroutines');
    }
}
