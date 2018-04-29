<?php

use Faker\Generator as Faker;

$factory->define(App\Cabinet::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->firstName,
        'location' => $faker->lastName,
        'image_id' => rand(1, 7) . '.jpg',
        'description' => $faker->text($maxNbChars = 50),
        'location' => $faker->address,
        'schedule' => 'Monday: 8:00 - 16:00 | Tuesday: 8:00 - 16:00 | Wednesday: 8:00 - 16:00 | Thursday: 8:00 - 16:00 | Friday: 8:00 - 16:00 | Saturday: 8:00 - 16:00 | Sunday: Closed',
        'admin_id' => rand(1, 4)
    ];
});
