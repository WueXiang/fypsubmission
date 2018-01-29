<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Meetinglog::class, function (Faker $faker) {
    return [
        'meeting_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'work_done' => $faker->paragraph,
        'work_to_be_done' => $faker->paragraph,
        'problem_encountered' => $faker->paragraph,
    ];
});