<?php
 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
 
class CreatePlagiarismReportsTable extends Migration {
 
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plagiarism_reports', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('filename');
            // $table->string('mime');
            $table->string('original_filename');
            $table->integer('fyp_id')->unsigned();
            $table->foreign('fyp_id')->references('id')->on('fypparts');
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
        Schema::drop('plagiarism_reports');
 
    }
 
}