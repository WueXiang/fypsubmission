<?php

use Illuminate\Database\Seeder;

class meetinglogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
    	factory(App\meetinglog::class, 6)->create();
	}
}
