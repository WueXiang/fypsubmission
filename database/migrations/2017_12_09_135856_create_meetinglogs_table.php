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
            $table->longtext('comment')->nullable();
            $table->integer('fyp_id')->unsigned();
            // $table->foreign('fyp_id')->references('id')->on('fypparts');
	      	$table->timestamps();
		});

        DB::table('meetinglogs')->insert(
        [
            'meeting_date' => '2018-01-06',
            'work_done' => 'google',
            'work_to_be_done' => 'google again',
            'problem_encountered' => 'dont know what to search in google',
            'fyp_id' => '10011',
        ]);

        DB::table('meetinglogs')->insert(
        [
            'meeting_date' => '2018-01-11',
            'work_done' => 'google again',
            'work_to_be_done' => 'this time try yahoo?',
            'problem_encountered' => 'no result in google',
            'fyp_id' => '10011',
        ]);

        DB::table('meetinglogs')->insert(
        [
            'meeting_date' => '2018-01-11',
            'work_done' => 'google',
            'work_to_be_done' => 'google again',
            'problem_encountered' => 'dont know what to search in google',
            'fyp_id' => '10012',
        ]);
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
