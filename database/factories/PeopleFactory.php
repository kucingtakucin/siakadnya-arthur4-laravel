<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\People;
use Faker\Generator as Faker;

$factory->define(People::class, function (Faker $faker) {
    return [
        'cardnumber' => $faker->creditCardNumber,
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'name' => $faker->name,
        'jobtitle' => $faker->jobTitle,
        'year' => $faker->year,
        'created_at' => now(),
    ];
});
