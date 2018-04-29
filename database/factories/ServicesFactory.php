<?php

use Faker\Generator as Faker;

$factory->define(App\Service::class, function (Faker $faker) {
    return [
        //
        'cabinet_id' => rand(1,4),
        'name' => $faker->words($nb = 3, $asText = true),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'icon' => 'home'
    ];
});
