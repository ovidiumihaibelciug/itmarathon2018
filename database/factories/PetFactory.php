<?php

use Faker\Generator as Faker;

$factory->define(App\Pet::class, function (Faker $faker) {
    $pets = ['dog','cat','fish','elephant','horse','chicken','parrot','hamster', 'else'];
    return [
        'name' => $faker->userName,
        'sex' => $faker->numberBetween(0, 1),
        'waist' => $faker->numberBetween(0, 300),
        'description' => 'abc',
        'type' => $pets[ rand(0, count($pets) - 1)] ,
        'birthday' => $faker->dateTime($max = 'now'),
        'user_id' => App\User::all()->random()->id,
        'observations' => $faker->text($maxNbChars = 100),
        'cabinet_id' => App\Cabinet::all()->random()->id,
    ];
});
