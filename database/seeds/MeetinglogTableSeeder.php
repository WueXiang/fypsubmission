<?php

use Illuminate\Database\Seeder;

class MeetinglogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
    	factory(App\Meetinglog::class, 6)->create();
	}
}
