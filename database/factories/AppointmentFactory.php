<?php

use Faker\Generator as Faker;

$factory->define(App\Appointment::class, function (Faker $faker) {
    return [
        'pet_id' => rand(1, 10),
        'service_id' => rand(1, 10),
        'cabinet_id' => rand(1, 10),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'date' => '9/11/2018'     
    ];
});
