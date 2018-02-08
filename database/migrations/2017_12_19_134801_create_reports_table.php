<?php
 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
 
class CreateReportsTable extends Migration {
 
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('filename')->nullable();
            // $table->string('mime');
            $table->string('comment')->nullable();
            $table->integer('fyp_id')->unsigned()->nullable();
            // $table->foreign('fyp_id')->references('id')->on('fypparts');
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
        Schema::drop('reports');
 
    }
 
}