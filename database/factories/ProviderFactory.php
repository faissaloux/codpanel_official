<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Provider;

$factory->define(Provider::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'full_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => \Hash::make('1234'), // password
        'phone' => $faker->regexify('6[0-9]{8}'),
        'deliver_price' => $faker->numberBetween($min = 1, $max = 999)
    ];
});
