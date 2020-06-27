<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'nim' => $faker->randomNumber(8),
        'nama' => $faker->name,
        'jurusan' => $faker->jobTitle,
        'angkatan' => $faker->year,
        'created_at' => now(),
    ];
});
