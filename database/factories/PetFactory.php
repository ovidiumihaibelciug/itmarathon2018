<?php

use Faker\Generator as Faker;

$factory->define(App\Pet::class, function (Faker $faker) {
    return [
        'name' => $faker->userName,
        'age' => $faker->numberBetween(0, 30),
        'sex' => $faker->numberBetween(0, 1),
        'description' => $faker->text($maxNbChars = 200),
        'type' => "Catelush cubanez",
        'owner_id' => App\User::all()->random()->id,
        'image_id' => function() {
            return factory(App\Media::class)->create()->id;
        },

    ];
});
