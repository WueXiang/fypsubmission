<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetinglogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetinglogs', function (Blueprint $table) {
	        $table->increments('id')->unique();
	      	$table->date('meeting_date');
	      	$table->longtext('work_done');
	      	$table->longtext('work_to_be_done');
	      	$table->longtext('problem_encountered');
            $table->longtext('comment');
            $table->integer('fyp_id')->unsigned();
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
        Schema::dropIfExists('meetinglogs');
    }
}
