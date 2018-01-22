<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFyp2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Fyp2s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fyp_id')->nullable();
            $table->string('supervisor_mark')->nullable();
            $table->string('moderator_mark')->nullable();
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
        Schema::dropIfExists('Fyp2s');
    }
}
