<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFypPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FypParts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fyp_id')->unsigned();
            $table->integer('part');
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
        Schema::dropIfExists('FypParts');
    }
}
