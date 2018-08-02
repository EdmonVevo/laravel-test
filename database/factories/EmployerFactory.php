<?php

use Faker\Generator as Faker;

$factory->define(App\Employer::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'company' => $faker->company,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,

    ];
});
