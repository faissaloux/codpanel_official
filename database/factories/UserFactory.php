<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'full_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => \Hash::make('1234'), // password
        'phone' => $faker->regexify('6[0-9]{8}'),
        'role' => $faker->randomElement(['Employee', 'provider']),
        'deliver_price' => $faker->numberBetween($min = 1, $max = 999)
    ];
});
