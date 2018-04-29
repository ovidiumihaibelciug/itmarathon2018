<?php

use Faker\Generator as Faker;

$factory->define(App\Cabinet::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->firstName,
        'location' => $faker->lastName,
        'image_id' => '1.jpg',
        'description' => $faker->text($maxNbChars = 200),
        'location' => $faker->address,
        'admin_id' => rand(1, 4)
    ];
});
